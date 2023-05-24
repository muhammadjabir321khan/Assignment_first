<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Employee;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $companies =  Company::where(function ($query) use ($request) {
            if ($request->has('name')) {
                $query->where('name', 'like', "%$request->name%")
                    ->orWhere('email', 'like', "%$request->name%");
                $query->orWhereHas('employee', function ($query)  use ($request) {
                    $query->where('fname', 'like', "%$request->name%")
                        ->orWhere('lname', 'like', "%$request->name%");
                    $query->orWhereHas('projects', function ($query) use ($request) {
                        $query->where('name', 'like', "%$request->name%")->orWhere('detail', 'like', "%$request->name%");
                    });
                });
            }
            if (($request->has('date'))) {
                $dateTime = DateTime::createFromFormat('d M, Y', $request->date);
                $databaseDate = $dateTime->format('Y-m-d');
                $query->where('created_at', 'like', "%$databaseDate%");
            }
            if (($request->has('min')) || ($request->has('max'))) {
                $query->whereHas('employee', function ($query)  use ($request) {
                    $query->select('company_id')
                        ->groupBy('company_id')
                        ->havingRaw('COUNT(*) >= ' . $request->min)
                        ->havingRaw('COUNT(*) <= ' . $request->max);
                });
            }
        })->with('employee.projects')->get();
        return CompanyResource::collection($companies);
    }
}

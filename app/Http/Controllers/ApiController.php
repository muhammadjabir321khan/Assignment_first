<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $companies = Company::with(['employee.projects'])->get();
        $company = CompanyResource::collection($companies);
        return response()->json([
            'companies' => $company
        ]);
    }
}

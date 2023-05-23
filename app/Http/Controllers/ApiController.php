<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $companies = Company::with(['employee'])->where(function ($query) use ($search) {
            $query->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhereHas('employee', function ($query) use ($search) {
                        $query->where('fname', 'like', "%$search%")
                            ->orWhere('lname', 'like', "%$search%");
                    });
            });
        })->get();

        // $companiesWithEmployeesInRange = $companies->filter(function ($company) {
        //     $employeeCount = $company->employee->count();
        //     return $employeeCount >= 2 && $employeeCount <= 10;
        // });

        // $companiesWithMinEmployees = $companiesWithEmployeesInRange->filter(function ($company) {
        //     $employeeCount = $company->employee->count();
        //     return $employeeCount >= 5;
        // });
        return response()->json([
            // 'companies' => $companiesWithEmployeesInRange,
            'all' => $companies,
            // 'employee' => $companiesWithMinEmployees

        ]);
        // }

        // $companiesWithEmployeesInRange now contains the filtered companies

        // ...rest of your code

        // public function index(Request $request)
        // {
        //     $search = $request->search;

        //     $companies = Company::with(['employee'])->where(function ($query) use ($search) {
        //         $query->when($search, function ($query) use ($search) {
        //             $query->where('name', 'like', "%$search%")
        //                 ->orWhere('email', 'like', "%$search%")
        //                 ->orWhereHas('employee', function ($query) use ($search) {
        //                     $query->where('fname', 'like', "%$search%")
        //                         ->orWhere('lname', 'like', "%$search%");
        //                 });
        //         });
        //     });

        //     if ($request->has('employee')) {
        //         $companies = $companies->whereHas('employee', function ($query) use ($search) {
        //             $query->where('fname', 'like', "%$search%")
        //                 ->orWhere('lname', 'like', "%$search%");
        //         });
        //     }

        //     $companies = $companies->get();
        //     return response()->json([
        //         'companies' => $companies

        //     ]);

        //     // $companies now contains the filtered companies based on the search query

        //     // ...rest of your code
        // }




    }
}

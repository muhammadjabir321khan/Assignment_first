<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{

    public function index(Request  $request)
    {
        if ($request->ajax()) {
            $employees = Employee::with(['company', 'projects'])->get();
            return Datatables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action = '<a href="' . route('employees.edit', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';

                    $action .= '<a class="btn btn-danger  btn-sm mx-1 delete" data-table="companies-table" data-method="DELETE"
                    data-url="' . route('employees.destroy', $row->id) . '" data-toggle="tooltip" data-placement="top" title="Delete Company">
                        Delete
                    </a>';
                    return $action;
                })->addColumn('company', function ($row) {
                    return $row->company ? $row->company->name : 'N/A';
                })->addColumn('projects', function ($row) {
                    $project = $row->projects;
                    return $project->pluck('name')->implode(', ');
                })
                ->rawColumns(['action', 'company', 'projects'])
                ->toJson();
        }


        return view('employees.index');
    }




    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {

        try {
            $employe = Employee::create($request->all());
            return response([
                'company ' => 'Employee is created'
            ]);
        } catch (\Exception $e) { {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => $request->errors(),
                ], 422);
            }
        }
    }


    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request,  Employee $employee)
    {
        $employee->update(
            $request->all()
        );
        return response([
            'employee' => 'employee is updated succfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['success' => 'Employee has been deleted']);
    }
}

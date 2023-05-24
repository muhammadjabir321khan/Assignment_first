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
        $companies = Company::all();
        if ($request->ajax()) {
            $employees = Employee::with(['company', 'projects'])->orderBy('id', 'desc');
            return Datatables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if (auth()->user()->hasRole('admin')) {
                        $action = '<a href="javascript:void(0)" class="btn btn-primary btn-sm my-2 edit" data-id="' . $row->id . '">Edit</a> ';
                        $action .= '<a class="btn btn-danger btn-sm mx-1 delete-record text-white" data-table="employee-table" data-method="DELETE"
                    data-url="' . route('employees.destroy', $row->id) . '" data-toggle="tooltip" data-placement="top" title="Delete Company">
                    Delete
                    </a>';
                        return  $action;
                    }
                })->addColumn('company', function ($row) {
                    return $row->company ? $row->company->name : 'N/A';
                })->addColumn('projects', function ($row) {
                    $project = $row->projects;
                    $newData = $project->pluck('name')->implode(', ');
                    return  $newData ? $newData : 'NA';
                })
                ->rawColumns(['action', 'company', 'projects'])
                ->toJson();
        }

        return view('employees.index', compact('companies'));
    }

    public function create()
    {

        abort(403);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {

        try {
            Employee::create($request->all());
            return response([
                'company ' => 'Employee is created'

            ], 200);
        } catch (\Exception $e) { {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => $e->getMessage()
                ], 401);
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
        return response()->json([
            'comapnies' => $companies,
            'employee' => $employee,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request,  Employee $employee)
    {


        try {
            $employee->update(
                $request->all()
            );
            return response([
                'employee' => 'employee is updated succfully'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' =>  401,
                'error' => $e->getMessage()
            ]);
        }
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

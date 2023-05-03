<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{


 

    /**
     * Show the form for creating a new resource.
     */



    public function index(Request  $request)
    {
        if ($request->ajax()) {
            $employees = Employee::with('company')->get();
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
                })
                ->rawColumns(['action', 'company'])
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
        $employe = Employee::create($request->all());
        if ($employe) {
            return response([
                'company ' => 'Employee is created' . $employe->id
            ]);
        } else {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $request->errors(),
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request,  $id)
    {
        $employee = Employee::find($id);
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->company_id = $request->company_id;
        $employee->save();
        return response([
            'employee' => 'employee is updated succfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Employee = Employee::findOrFail($id);
        $Employee->delete();
        return response()->json(['success' => 'Employee has been deleted']);
    }
}

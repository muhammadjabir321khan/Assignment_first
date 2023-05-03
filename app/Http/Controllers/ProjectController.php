<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Employee;
use App\Models\Projects;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employees = Projects::with('employee')->get();
            return Datatables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action = '<a href="' . route('employees.edit', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';

                    $action .= '<a class="btn btn-danger  btn-sm mx-1 delete" data-table="companies-table" data-method="DELETE"
                    data-url="' . route('employees.destroy', $row->id) . '" data-toggle="tooltip" data-placement="top" title="Delete Company">
                        Delete
                    </a>';
                    return $action;
                })->addColumn('employee', function ($row) {
                    $employee = $row->employee;
                        $names = $employee->pluck('fname')->implode(', ');
                        return $names ?: 'N/A';
                })

                ->rawColumns(['action', 'employee'])
                ->toJson();
        }
        return view('projects.index');
    }


    public function create()
    {
        $employies = Employee::all();
        return view('projects.create', compact('employies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {

        $project = Projects::create($request->all());
        $project->employee()->attach($request->employee_id);
        return response([
            'project' => 'project is created succesfully'
        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

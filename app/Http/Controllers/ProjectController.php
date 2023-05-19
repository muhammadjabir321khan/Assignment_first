<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employies = Employee::all();
        if ($request->ajax()) {
            $employees = Project::with('employee')->get();
            return Datatables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action = '<a href="javascript:void(0)"  class="btn btn-primary btn-sm  edit" data-id="' . $row->id . '">Edit</a>     ';
                    $action .= '<a class="btn btn-danger btn-sm  delete-project" data-table="table" data-method="DELETE"
                    data-url="' . route('projects.destroy', $row->id) . '" data-toggle="tooltip" data-placement="top" title="Delete Company">
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
        return view('projects.index', compact('employies'));
    }


    public function create()
    {
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        try {
            $project = Project::create($request->all());
            $project->employee()->attach($request->employee_id);
            return response([
                'project' => 'project is created succesfully'
            ], 200);
        } catch (\Exception $e) {
            return response([
                'errors' => 'project is Not succesfully',
                'errors' => $e->getMessage(),
            ], 401);
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
    public function edit(Project $project)
    {
        $employies  = Employee::all();

        return response()->json([
            'employee' => $employies,
            'project' => $project

        ]);
        // return view('projects.edit', compact('project', 'employies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        $project->employee()->sync([$request->employee_id]);
        return response([
            'status' => 'data is updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response([
            'status' => 'project is deleted'
        ]);
    }
}

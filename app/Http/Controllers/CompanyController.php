<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class CompanyController extends Controller
{

    public function index(Request  $request)
    {
        $company = Company::all();
        if ($request->ajax()) {
            return Datatables::of($company)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action = '<a href="javascript:void(0)"  class="btn btn-primary btn-sm edit" data-id="' . $row->id . '">Edit</a>     ';
                    $action .= '<a class="btn btn-danger mx-1 btn-sm delete-company" data-table="company" data-method="DELETE"
                    data-url="' . route('companies.destroy', $row->id) . '" data-toggle="tooltip" data-placement="top" title="Delete Company">
                        Delete
                    </a>';
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('companies.index', compact('company'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        try {
            DB::beginTransaction();
            if ($request->has('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $filePath = '/public/images';
                Storage::disk('local')->put($filePath . '/' . $filename, file_get_contents($file));
                $data = $request->all();
                $data['logo'] = $filename;
            } else {
                $request->validate();
            }
            Company::create($data);
            if ($request->user()->hasRole('admin')) {
                $user = Auth::user();
                \App\Jobs\MailJob::dispatch($user)->delay(now()->addSecond(1));
            }

            DB::commit();
            return response([
                'company ' => ' company  is created'
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $e->getMessage(),
            ], 403);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {

        return response()->json([
            'data' => $company
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    // Inside the update method of the controller
    public function update(Request $request, $id)
    {

        try {
            $existingCompany = Company::find($id);
            if (!$existingCompany) {
                throw new \Exception('Company not found.');
            }

            if ($request->hasFile('image')) {
                Storage::delete('public/images/' . $existingCompany->logo);
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs('public/images', $filename);
                $existingCompany->logo = $filename;
            }

            $existingCompany->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Company updated successfully.'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 401);
        }
    }



    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(['success' => 'Company has been deleted']);
    }

    public  function search(Request $request)
    {

        $search = request('search');
        $projects = Project::Where('detail', 'like', "%$search%")->pluck('detail');

        $companies = Company::where(function ($query) use ($projects) {
            foreach ($projects  as $project) {
                $query->orWhere('name', 'like', "%$project%");
            }
        })->get();
        return view('companies.searching', compact('companies'));
    }
}

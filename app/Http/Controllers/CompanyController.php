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

    public function __construct()
    {
        $this->middleware(
            'permission: create companies|edit companies| view companies|delete companies',
            ['only' => ['index', 'store', 'create', 'edit', 'show', 'update', 'delete']]
        );
    }

    public function index(Request  $request)
    {
        $company = Company::all();
        if ($request->ajax()) {
            return Datatables::of($company)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action = '<a href="' . route('companies.edit', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';
                    $action .= '<a class="btn btn-danger mx-1 btn-sm delete" data-table="companies-table" data-method="DELETE"
                    data-url="' . route('companies.destroy', $row->id) . '" data-toggle="tooltip" data-placement="top" title="Delete Company">
                        Delete
                    </a>';
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('companies.index');
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
        if($request->user()->hasRole('admin')){
             $user=Auth::user();
            \App\Jobs\MailJob::dispatch($user)->delay(now()->addSecond(1));
        }
          
            DB::commit();
            return response([
                'company ' => ' company  is created'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $e->getMessage(),
            ], 422);
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
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Inside the update method of the controller
    public function update(Request $request, Company $company)
    {
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if ($request->hasFile('image')) {
            Storage::delete('public/images/' . $company->logo);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $filename);
            $company->logo = $filename;
        }
        $company->update();
        return response()->json([
            'success' => true,
            'message' => 'Company updated successfully.'
        ]);
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
        // projects search by name
        // $companies= Company::Where('name', 'like', "%$search%")->pluck('name','email');
        // $companies = Project::where(function ($query) use ($companies) {
        //     foreach ($companies as $project) {
        //         $query->orWhere('detail', 'like', "%$project%");
        //     }
        // })->get();
        return view('companies.searching', compact('companies'));
    }
}

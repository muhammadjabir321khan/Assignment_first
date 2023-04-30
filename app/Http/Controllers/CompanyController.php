<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission: create companies|edit companies| view companies|delete companies', ['only' => ['index','create']]);

    }

    

    public function index()
    {
        return view('companies.index');
    }
    public function datatable(Request  $request)
    {
        
        if ($request->ajax()) {
            $company = Company::all();
            return Datatables::of($company)
                ->addIndexColumn()
                ->addColumn('action', function () {
                    $action = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';
                    $action = $action . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                    return $action;
                })
                ->rawColumns(['action'])
                ->toJson();

        }

        return view('companies.index', compact('company'));
    }



    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest  $request)
    {
        $company = new Company();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->storeAs('public/images', $filename); 
            $company->logo = $filename;
        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->save();
        $url = asset('storage/images/' . $company->logo); 
        return response([
            'company' => 'company is created with logo ' . $url
        ]);
        
        
        $company->name = $request->name;
        $company->email = $request->email;
        $company->save();
        return response([
            'company ' => ' company  is created' . $company->id
        ]);
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

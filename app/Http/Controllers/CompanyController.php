<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Jobs\MailJob;
use App\Mail\CompanyCreated;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class CompanyController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission: create companies|edit companies| view companies|delete companies', ['only' => ['index', 'create']]);
    }


    public function index(Request  $request)
    {

        $company = Company::all();
        if ($request->ajax()) {
            return Datatables::of($company)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action = '<a href="' . route('companies.edit', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';
                    $action .= '<a class="btn btn-danger btn-sm delete" data-table="companies-table" data-method="DELETE"
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

    public function store(Request  $request)
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
        if ($company) {
            $user = User::find(2);
            \App\Jobs\MailJob::dispatch($user)->delay(now()->addSeconds(5));
            return response([
                'company ' => ' company  is created' . $company->id
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Inside the update method of the controller
    public function update(Request $request, string $id)
    {
        $company = Company::find($id);

        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if ($request->hasFile('image')) {
            Storage::delete('public/images/' . $company->logo);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $filename);
            $company->logo = $filename;
        }

        $company->save();
        return redirect('/companies');
        return response()->json([
            'success' => true,
            'message' => 'Company updated successfully.'
        ]);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json(['success' => 'Company has been deleted']);
    }
}

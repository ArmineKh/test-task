<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEmployeRequest;
use Storage;


class EmployeController extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('Employe.create', ['company_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeRequest $request)
    {
           $employee = Employe::create(['name' => $request->input('name'),
           'email' => $request->input('email'),
           'phone' => $request->input('phone'),
           'salary' => $request->input('salary'),
           'company_id' => $request->input('company_id'),
           'position_id' => $request->input('position_id')

       ]);

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $employe = Employe::find($id);
         $company = Company::find($employe->company_id);
        return view('Employe.edit',['employe'=> $employe, 'company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEmployeRequest $request, $id)
    {
        $employe = Employe::find($request->input('id'))
     ->update(['name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'salary' => $request->input('salary')]);

     return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employe::find($id);
       $employe->delete();
       return redirect()->route('companies.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEmployeRequest;
use Storage;


class EmployeController extends Controller
{

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

        return redirect()->route('companies.show',  $employee->company->id);
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
        // dd(Employe::find($id));
        $employe = Employe::find($id)
     ->update(['name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'salary' => $request->input('salary'),
        'position_id' => $request->input('position'),
    ]);
     $company_id = Employe::find($id)->company->id; 

     return redirect()->route('companies.show', $company_id);
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
       return redirect()->route('companies.show', $employe->company->id);
    }
}

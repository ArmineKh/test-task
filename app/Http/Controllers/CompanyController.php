<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanieRequest;
use Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyes = Company::paginate(10);
        return view('company.index',['companyes'=>$companyes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $company = Company::find($id);
        return view('company.show',['company'=> $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit',['company'=> $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $logoName = '';
        if ($request->file('logo'))
        {
         $logoName = $request->file('logo')->store('/public');
         $logoName = str_replace('public', 'storage', $logoName);
     }

     $comp = Company::find($request->input('id'))
     ->update(['name' => $request->input('name'),
        'email' => $request->input('email'),
        'logo' => $logoName,
        'website' => $request->input('website')]);

     return redirect()->route('company.index')->with('info','Company Updated Successfully');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $company = Company::find($id);
       $company->delete();
       return redirect()->route('company.index');
   }
}

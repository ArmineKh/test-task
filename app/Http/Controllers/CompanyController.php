<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Comment;
use App\Models\Employe;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanieRequest;
use App\Http\Requests\RegisterCompanyRequest;
use App\Http\Requests\LoginCompanyRequest;
use Illuminate\Support\Facades\Session;
use Hash;
use Storage;

class CompanyController extends Controller
{
   public function __construct()
   {
    // $this->middleware('islogin');
    }

    public function register(){
        return view('auth.register');
    }

    public function registration(RegisterCompanyRequest $request){

         $company = Company::create(['name' => $request->input('name'),
           'email' => $request->input('email'),
           'phone' => $request->input('phone'),
           'password' => Hash::make($request->input('password')),

       ]);

         return redirect()->route('login');
  
    }

    public function login(){
        return view('auth.login');
    }

    public function logInPost(LoginCompanyRequest $request){
        $company = Company::where('email', $request->email)->first();
        if (empty($company)) {
            Session::flash("errors", ["The email is wrong"]);
         return redirect()->route('login');
        } elseif (password_verify($request->password, $company->password)) {
                Session::put("company", $company);
         return redirect()->route('companies.index');

        }
    }

    public function logout(){
        Session::flush();
         return redirect()->route('login');
    }


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
    public function update(CreateCompanieRequest $request, $id)
    {
        $logoName = '';
        if ($request->file('logo'))
        {
            $logoName = $request->input('name').'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('storage'), $logoName);
        }

        $comp = Company::find($request->input('id'))
        ->update(['name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => $logoName,
            'website' => $request->input('website')]);

        return redirect()->route('companies.index')->with('info','Company Updated Successfully');
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
     return redirect()->route('companies.index');
 }

 
}

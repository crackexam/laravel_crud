<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$arr['company'] = Company::all();
        return view('admin.company_list')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'company_name' => 'required|alpha',
			'company_email' => 'required|email',
			'company_address' => 'required',
			'company_contact' => 'required',
			'company_gst' => 'required|alpha_num',
			'company_logo' => 'required|image|mimes:jpg,png,jpeg',
			'bank_name' => 'required',
			'account_name' => 'required',
			'account_number' => 'required',
			'ifsc_code' => 'required|alpha_num',
		]);
		$company = new Company;
        $company->name = $request->company_name;
        $company->email = $request->company_email;
        $company->address = $request->company_address;
        $company->mobile = $request->company_contact;
        if($request->hasfile('company_logo')){
            $file = $request->file('company_logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/companyimg/', $filename);
            $company->companylogo = $filename;
        }
        $company->gstnumber = $request->company_gst;
        $company->bankname = $request->bank_name;
        $company->accountname = $request->account_name;
        $company->accountnumber = $request->account_number;
        $company->bankifsccode = $request->ifsc_code;
        $company->save();
        return redirect('company');
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
        return view('admin.view_company',['company'=>$company]);
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
        return view('admin.edit_company',['company'=>$company]);
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
        $request->validate([
			'company_name' => 'required|alpha',
			'company_email' => 'required|email',
			'company_address' => 'required',
			'company_contact' => 'required',
			'company_gst' => 'required|alpha_num',
			//'company_logo' => 'required|image|mimes:jpg,png,jpeg',
			'bank_name' => 'required',
			'account_name' => 'required',
			'account_number' => 'required',
			'ifsc_code' => 'required|alpha_num',
		]);
		$company = Company::find($id);
        $company->name = $request->company_name;
        $company->email = $request->company_email;
        $company->address = $request->company_address;
        $company->mobile = $request->company_contact;
        if($request->hasfile('company_logo')){
            $file = $request->file('company_logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/companyimg/', $filename);
            $company->companylogo = $filename;
        }
        $company->gstnumber = $request->company_gst;
        $company->bankname = $request->bank_name;
        $company->accountname = $request->account_name;
        $company->accountnumber = $request->account_number;
        $company->bankifsccode = $request->ifsc_code;

        if($company->save()){
          return redirect('company')->with('success','Company Details Updated Successfully');  
        }

        return back()->withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('company');
		
    }
	
	public function delete($id)
    {
        $company = Company::find($id);

        return view('admin.delete_company', compact('company'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $arr['client'] = Client::all();
       // print_r($arr);
        return view('admin.client.client_list')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.add_client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
        $this->validate($request, [
            'client_name' 		=> 'required',
            'client_company' 	=> 'required',
            'client_email' 		=> 'required|email|unique:clients,client_email',
            'client_contact'	=> 'required|numeric',
            'client_gst' 		=> 'required',
            'client_address' 	=> 'required',
            'client_pincode' 	=> 'required|numeric',
			'client_state'  	=> 'required',
			"other_state" 		=> "required_if:client_state,Other",
			"client_country" 	=> "required_if:client_state,Other",
         ]);
        $client->client_name 	= $request->client_name; 	
		$client->client_company = $request->client_company;
		$client->client_email   = $request->client_email; 
		$client->client_mobile  = $request->client_contact;
		$client->client_gst 	= $request->client_gst; 	
		$client->client_address = $request->client_address;
		$client->client_pincode = $request->client_pincode;
		$client->client_state   = $request->client_state; 
		$client->client_other_state 	= $request->other_state;
		$client->client_country = isset($request->client_country)?$request->client_country:'India';
		$client->save();
		return redirect('client')->with('success','Client Details Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        print_r($client);
        //return view('admin.client.edit_client', ['client'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        //print_r($client);
        return view('admin.client.edit_client', ['client'=>$client]);
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
        $this->validate($request, [
            'client_name' 		=> 'required',
            'client_company' 	=> 'required',
            'client_email' 		=> 'required|email',
            'client_contact'	=> 'required|numeric',
            'client_gst' 		=> 'required',
            'client_address' 	=> 'required',
            'client_pincode' 	=> 'required|numeric',
			'client_state'  	=> 'required',
			"other_state" 		=> "required_if:client_state,Other",
			"client_country" 	=> "required_if:client_state,Other",
         ]);
		 $client = Client::find($id);
		 $client->client_name 	= $request->client_name; 	
		 $client->client_company = $request->client_company;
		 $client->client_email   = $request->client_email; 
		 $client->client_mobile = $request->client_contact;
		 $client->client_gst 	= $request->client_gst; 	
		 $client->client_address = $request->client_address;
		 $client->client_pincode = $request->client_pincode;
		 $client->client_state   = $request->client_state; 
		 $client->client_other_state 	= $request->other_state;
		 $client->client_country = isset($request->client_country)?$request->client_country:'India';
		 if($client->save()){
          return redirect('client')->with('success','Client Details Updated Successfully');  
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
        Client::destroy($id);
        return redirect('client');
		
    }
	public function delete($id)
    {
        $client = Client::find($id);

        return view('admin.client.delete_client', compact('client'));
    }
	
	/**
     * Check the specified Email from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function search(Request $request)
    {
       if($request->ajax())
        {
        $data = Client::where('client_email','LIKE','%'. $request->get('search') ."%")->get();
        return response()->json($data);
        //    return 'Access Search' . $request->get('search');
        }
    }
}

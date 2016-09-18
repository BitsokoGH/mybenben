<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use App\Properties;

use Input;
use Validator;
use Redirect;
Use Route;
use Session;
use DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $properties = Properties::all();//where('user_id','$user_id');
        return view('properties.myproperties',compact('properties'));
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
        //
		$property = properties::find($id);
		return view('properties.show',compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	 /**
     * find property based on search criteria
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
			//search through properties db for user parameter entered
		$rules = array('search_param'=> 'required');			
		$validator = Validator::make($request->all(), $rules);		
		
		if ($validator->passes())
		{
			$search_param = $request->get('search_param');	
			$result = Properties::where('lease_no',$search_param)
								  ->orWhere('file_no', $search_param)
								  ->first();
			if(is_object($result)){
				$property = $result;
				return view('properties.show',compact('property'));
			}else{
				return redirect()->back();
			}
		}else{
			return redirect()->back();
		}
    }
	
	public function adminsearch(Request $request){
		
		$rules = array('search_param'=> 'required');			
		$validator = Validator::make($request->all(), $rules);		
		
		if ($validator->passes())
		{
		
			$search_param = $request->get('search_param');	
			$result = Properties::where('lease_no',$search_param)
								  ->orWhere('file_no', $search_param)
								  ->first();

			if(is_object($result)){
				$data = array('property' => Properties::find($result->id)
											->load('documents')
							  );
				return view('properties.adminsearchresults',$data);
			}else{
				return view('errors.notfound');
			}
		}else{
			return view('errors.notfound');
		}		
	}
}

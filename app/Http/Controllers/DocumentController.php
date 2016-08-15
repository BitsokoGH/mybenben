<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Documents;
use App\Properties;

use Input;
use Validator;
use Redirect;
use Route;
use Session;
use DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$docs = Documents::all();
		return view('documents.mydocs',compact('docs'));
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
		
		/*if ($request->->hasFile('filefield')) {*/
		$file = $request->file('filefield');
		$extension =$request->file('filefield')->getClientOriginalExtension();
		$file->move(base_path() .'/public/docs',$request->file('filefield')->getClientOriginalName());
		
		$entry = new Documents();

		$entry->doc_type = $request->doc_type;
		$entry->doc_description = $request->doc_description;		
		$entry->doc_status = "New";		
		$entry->doc_url = $request->file('filefield')->getClientOriginalName();		
		$entry->properties_id = $request->properties_id;
		$entry->downloaded = "No";
		$entry->download_key = "Not Yet";
 
		$entry->save();
		$property = Properties::find($request->properties_id);
		return [ 'msg' => 'done'];
		
		//}else{
		//return view('errors.notfound');
		//}
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
		//$docs = Documents::find(1);
		//return view('documents.docreview',compact('docs'));
	    if(isset($id)) {
                $docs = new Documents();
                $doc = $docs::find($id);
                if($doc){
                    return View('documents.document_review', compact('doc'));
                } else {
                    return View('documents.to_do')->with('flash_error', 'true')
                                ->withErrors("Document not found");
                }
            } else {
                return View('documents.to_do');
            }		
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
	
	public function pending(){
	
		$todos = Documents::all();
		return view('documents.to_do',compact('todos'));
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
}

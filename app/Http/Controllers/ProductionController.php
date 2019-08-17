<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Productiondata;
use Yajra\Datatables\Datatables;

Class ProductionController extends Controller{
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        //echo "In prod controller";
    }


   		/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function store(Request $request)
    {  	
    	$last_inserted_id = 0;
		if($request->hasFile('movie_image'))
		{	
			$file = $request->file('movie_image');
			$fileArray = array(
				'file' => $file,
				'type' => $request->type,
				'title' => $request->title,
				'star_cast' => $request->star_cast,
				'release_date' => $request->release_date,
				'synopsis' => $request->synopsis,
				'trailer_link' => $request->trailer_link,
				'cost' => 	$request->cost,
			);
			
			$rules = array(
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:3000',
			'type' => 'required',
			'title' => 'required',
			'star_cast' => 'required',
			'release_date' => 'required',
			'synopsis' => 'required',
			'trailer_link' => 'required',
			'cost' => 'required',
        	);
			$customMessages = [
        		'max' => 'The :attribute max allowed file size is :maxMB',
    		];

        	$validator = Validator::make($fileArray, $rules,$customMessages);
        	if ($validator->fails())
    		{
    			//return json["error"=>$validator->errors()->getMessages(),400];
	          // Redirect or return json to frontend with a helpful message to inform the user 
	          // that the provided file was not an adequate type
	          return response()->json(['error' => $validator->errors()->getMessages()], 400);
    		} else{

				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
    			$uploaded_file_name = $request->movie_image->store(config('constant.production_file_uploads_path'));

    			$save_data = array(
					'type' =>$request->type,
					'title' =>$request->title,
					'star_cast' =>$request->star_cast,
					'release_date' =>$request->release_date,
					'synopsis' =>$request->synopsis,
					'tariler_link' =>$request->trailer_link,
					'cost' =>$request->cost,
					'poster_image_name' =>$uploaded_file_name,
					'poster_image_path' =>storage_path('app').config('constant.production_file_uploads_path'),
					'poster_image_ext' =>$extension,
					'approx_release_date' =>'2020-01-01 00:00:00',
					'actual_release_date' =>'2020-01-01 00:00:00',
    			);		
    			$create_response = Productiondata::create($save_data);
    			$last_inserted_id = $create_response->id;
    			
    			if($last_inserted_id != 0){
    				return response()->json(['message' => "Opportunity Added Successfully"], 200);
    			}		
    		}
		}
	}

	public function view(){
		return datatables()->of(Productiondata::all())->toJson();
	}		
}
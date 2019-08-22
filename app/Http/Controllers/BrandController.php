<?php

namespace App\Http\Controllers;

use App\Models\Productiondata;
use Yajra\Datatables\Datatables;

Class BrandController extends Controller{
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){   
        //echo "In brand controller";
    }

	public function view(){
		return datatables()->of(Productiondata::all())->toJson();
	}		
}
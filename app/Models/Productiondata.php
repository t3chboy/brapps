<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Productiondata extends Model{
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'production_data';


    protected $fillable = [
	'type','title','star_cast','release_date','synopsis','tariler_link','cost','poster_image_name','poster_image_path','poster_image_ext','approx_release_date','actual_release_date',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
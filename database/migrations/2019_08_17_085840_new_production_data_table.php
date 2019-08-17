<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewProductionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type',1000);
            $table->string('title',1000);
            $table->string('star_cast',1000);
            $table->date('release_date');
            $table->string('synopsis',1000);
            $table->string('tariler_link',1000);
            $table->decimal('cost',12,2);
            $table->string('poster_image_name',1000);
            $table->string('poster_image_path',1000);
            $table->string('poster_image_ext',1000);
            $table->date('approx_release_date');
            $table->date('actual_release_date');
            $table->timestamps();
            $table->softDeletes();
            $table->enum('status',[1,0])->default(1);
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('production_data', function (Blueprint $table) {
            
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAppoitementTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('appoitement',function(Blueprint $table){
            $table->increments("id");
            $table->integer("medicalstructure_id")->references("id")->on("medicalstructure")->nullable();
            $table->integer("patient_id")->references("id")->on("patient")->nullable();
            $table->integer("doctor_id")->references("id")->on("doctor")->nullable();
          
           
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appoitement');
    }

}
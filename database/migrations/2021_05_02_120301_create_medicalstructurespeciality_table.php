<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateMedicalStructureSpecialityTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('medicalstructurespeciality',function(Blueprint $table){
            $table->increments("id");
            $table->integer("speciality_id")->references("id")->on("speciality");
            $table->integer("medicalstructure_id")->references("id")->on("medicalstructure");
            $table->timestamps();
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
        Schema::drop('medicalstructurespeciality');
    }

}
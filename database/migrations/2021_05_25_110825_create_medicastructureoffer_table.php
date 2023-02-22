<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateMedicastructureofferTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('medicastructureoffer',function(Blueprint $table){
            $table->increments("id");
            $table->integer("medicalstructure_id")->references("id")->on("medicalstructure");
            $table->integer("offertype_id")->references("id")->on("offertype");
            $table->date("begginningdate");
            $table->date("enddate");
            $table->tinyInteger("activated")->default(1)->nullable();
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
        Schema::drop('medicastructureoffer');
    }

}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateBuildingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('building',function(Blueprint $table){
            $table->increments("id");
            $table->integer("site_id")->references("id")->on("site");
            $table->string("label");
            $table->string("alias")->nullable();
            $table->text("description")->nullable();
            $table->tinyInteger("activated")->default(0)->nullable();
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
        Schema::drop('building');
    }

}
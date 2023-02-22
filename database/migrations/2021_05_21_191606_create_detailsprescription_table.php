<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateDetailsprescriptionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('detailsprescription',function(Blueprint $table){
            $table->increments("id");
            $table->integer("prescription_id")->references("id")->on("prescription");
            $table->integer("drug_id")->references("id")->on("drug");
            $table->string("dose");
            $table->string("duration");
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
        Schema::drop('detailsprescription');
    }

}
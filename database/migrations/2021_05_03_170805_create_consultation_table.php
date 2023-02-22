<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateConsultationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('consultation',function(Blueprint $table){
            $table->increments("id");
            $table->integer("appoitement_id")->references("id")->on("appoitement");
            $table->integer("report_id")->references("id")->on("report");
            $table->integer("visitnature_id")->references("id")->on("visitnature");
            $table->integer("visitstatus_id")->references("id")->on("visitstatus");
            $table->integer("visittype_id")->references("id")->on("visittype");
            $table->date("date");
            $table->string("time");
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
        Schema::drop('consultation');
    }

}
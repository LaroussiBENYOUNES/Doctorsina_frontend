<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateDoctorTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('doctor',function(Blueprint $table){
            $table->increments("id");
            $table->string("fullname");
            $table->integer("user_id")->references("id")->on("user");
            $table->integer("country_id")->references("id")->on("country");
            $table->integer("speciality_id")->references("id")->on("speciality");
            $table->date("birthday")->nullable();
            $table->string("gender")->nullable();
            $table->string("codecnam")->nullable();
            $table->string("matricule")->nullable();
            $table->integer("with_administrator_option")->nullable();
            $table->tinyInteger("activated")->default(1)->nullable();
            $table->tinyInteger("signaled")->default(0)->nullable();
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
        Schema::drop('doctor');
    }

}
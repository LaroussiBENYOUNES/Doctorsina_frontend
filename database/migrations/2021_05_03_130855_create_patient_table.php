<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreatePatientTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('patient',function(Blueprint $table){
            $table->increments("id");
            $table->string("fullname");
            $table->integer("user_id")->references("id")->on("user")->nullable();
            $table->date("birthday")->nullable();
            $table->string("gender")->nullable();
            $table->string("identitymatricule")->nullable();
            $table->string("passport")->nullable();
            $table->tinyInteger("activated")->default(1)->nullable();
            $table->tinyInteger("authorize")->default(1)->nullable();
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
        Schema::drop('patient');
    }

}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateMedicalStructureTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('medicalstructure',function(Blueprint $table){
            $table->increments("id");
            $table->string("label");
            $table->string("alias")->nullable();
            $table->text("description")->nullable();
            $table->integer("structuretype_id")->references("id")->on("structuretype");
            $table->integer("country_id")->references("id")->on("country");
            $table->tinyInteger("signaled")->default(0)->nullable();
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
        Schema::drop('medicalstructure');
    }

}
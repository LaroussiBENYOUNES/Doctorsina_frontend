<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateDrugTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('drug',function(Blueprint $table){
            $table->increments("id");
            $table->integer("drugfamilly_id")->references("id")->on("drugfamilly");
            $table->integer("drugmaker_id")->references("id")->on("drugmaker");
            $table->string("alias");
            $table->text("description")->nullable();
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
        Schema::drop('drug');
    }

}
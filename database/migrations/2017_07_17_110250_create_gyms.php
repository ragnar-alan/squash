<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGyms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("gyms", function(Blueprint $table) {
            $table->increments("gid");
            $table->string("gym_name");
            $table->string("city");
            $table->string("street");
            $table->string("zip_code");
            $table->string("number");
            $table->json("discount_type")->comment("for example: Sport card or All You Can Move etc");
            $table->tinyInteger("number_of_courts");
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
        Schema::drop("gyms");
    }
}

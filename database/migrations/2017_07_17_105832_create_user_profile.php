<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user_profile", function(Blueprint $table) {
            $table->increments("pid");
            $table->integer("uid")->unsigned();
            $table->foreign("uid")->references("id")->on("users");
            $table->string("fname");
            $table->string("lname");
            $table->string("place");
            $table->dateTime("valid_from");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("user_profile");
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("participants", function(Blueprint $table) {
            $table->increments("pid");
            $table->integer("uid")->unsigned();
            $table->foreign("uid")->references("id")->on("users");
            $table->integer("reservation_id")->unsigned();
            $table->foreign("reservation_id")->references("rid")->on("reservations");
            $table->unique(["uid", "reservation_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("participants");
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("season_tickets", function(Blueprint $table){
            $table->increments("tid")->unsigned();
            $table->string("gym");
            $table->dateTime("valid_from");
            $table->dateTime("valid_to");
            $table->tinyInteger("occasions")->unsigned();
            $table->string("ticket_name")->nullable();
            $table->integer("full_price");
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
        Schema::drop("season_tickets");
    }
}

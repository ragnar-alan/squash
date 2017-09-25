<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyInReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("reservations", function(Blueprint $table) {
            $table->dropForeign("reservations_ticket_id_foreign");
            $table->dropColumn("ticket_id");
        });
        Schema::table("reservations", function(Blueprint $table) {
            $table->integer('ticket_id')->after("rid")->unsigned();
            $table->foreign("ticket_id")->references("tid")->on("season_tickets")->onDelete("no action");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("reservations", function(Blueprint $table) {
            $table->dropForeign("reservations_ticket_id_foreign");
            $table->dropColumn("ticket_id");
        });
        Schema::table("reservations", function(Blueprint $table) {
            $table->integer('ticket_id')->after("rid")->unsigned();
            $table->foreign("ticket_id")->references("tid")->on("season_tickets");
        });
    }
}

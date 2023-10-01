<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeleMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tele_monitorings', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->float("current_weight");
            $table->float("blood_pressure");
            $table->float("blood_sugar_level");
            $table->float("waist_circumfrence");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tele_monitorings');
    }
}

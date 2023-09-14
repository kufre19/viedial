<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealBuiltsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_built', function (Blueprint $table) {
            $table->id();
            $table->string("user");
            $table->string("shopping_list_id");
            $table->string("season_id")->nullable();
            $table->string("name")->nullable();
            $table->string("meal_type");
            $table->string("food_to_be_cooked_id");
            $table->string("serving_info");
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
        Schema::dropIfExists('meal_builts');
    }
}

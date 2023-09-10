<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_assessments', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("have_hypertension")->default("NA");
            $table->string("have_diabetes")->default("NA");
            $table->string("gender")->default("NA");
            $table->string("age")->default("NA");
            $table->string("weight")->default("NA");
            $table->string("height")->default("NA");
            $table->string("treating_hbp")->default("NA");
            $table->string("systolic_bp")->default("NA");
            $table->string("smoking")->default("NA");
            $table->string("fam_cvd")->default("NA");
            $table->string("waistline")->default("NA");
            $table->string("exercise")->default("NA");
            $table->string("eat_vegie")->default("NA");
            $table->string("treated_sugar_hbp")->default("NA");
            $table->string("fam_diabetes")->default("NA");
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
        Schema::dropIfExists('risk_assessments');
    }
}

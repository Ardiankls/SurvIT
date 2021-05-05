<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            // $table->integer('age_from');
            // $table->integer('age_to');
            // $table->integer('point');
            $table->string('title');
            $table->string('link');
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('job_id')->constrained();
            $table->foreignId('interest_id')->constrained();
            $table->integer('limit');
            $table->integer('pay');
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
        Schema::dropIfExists('surveys');
    }
}

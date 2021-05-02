<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_q', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained();
            $table->integer('qtype');
            $table->string('question');
            $table->enum('null_able', ['0', '1'])
            ->default( '0')->comment('0 = Not null, 1 = Can be null');
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
        Schema::dropIfExists('survey_qs');
    }
}

<?php

use App\Models\account_payment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['0', '1'])
                ->default('0')->comment('0 = income, 1 = outcome');
            $table->foreignId('status_id')->constrained();
            $table->integer('point');
            $table->foreignId('account_payment_id')->nullable()->constrained();
            $table->foreignId('user_survey_id')->nullable()->constrained();
            // $table->integer('account_payment_id');
            // $table->foreign('account_payment_id')->references('id')->on('account_payments');
            // $table->integer('user_survey_id')->unsigned();
            // $table->foreign('user_survey_id')->references('id')->on('user_surveys');
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
        Schema::dropIfExists('point_logs');
    }
}

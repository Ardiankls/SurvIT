<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusPackageShareableToSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->integer('package_id')->after('link')->constrained();
            $table->enum('shareable', ['0', '1'])->after('count')
                ->default('0')->comment('0 = no, 1 = yes');
            $table->foreignId('status_id')->constrained()->default(2)->after('shareable');
            // $table->unsignedInteger('status_id')->index()->default(2)->after('shareable');

            // $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->dropColumn('package');
            $table->dropColumn('shareable');
        });
    }
}

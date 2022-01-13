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
            $table->string('shareable')->after('count')->nullable();
            $table->foreignId('package_id')->after('shareable')->constrained();
            $table->foreignId('status_id')->after('package_id')->default(2)->constrained();
            $table->timestamp('opened_at')->after('status_id')->nullable();
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
            $table->dropColumn('shareable');
            $table->dropColumn('opened_at');
        });
    }
}

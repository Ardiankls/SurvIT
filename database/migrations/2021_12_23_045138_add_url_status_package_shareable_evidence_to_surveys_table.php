<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlStatusPackageShareableEvidenceToSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->string('url')->after('link');
            $table->enum('shareable', ['0', '1'])
                ->default('0')->comment('0 = no, 1 = yes')->after('count')->nullable();;
            $table->text('evidence')->after('shareable')->nullable();
            $table->foreignId('package_id')->after('evidence')->constrained();
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
            $table->dropColumn('url');
            $table->dropColumn('shareable');
            $table->dropColumn('evidence');
            $table->dropColumn('opened_at');
        });
    }
}

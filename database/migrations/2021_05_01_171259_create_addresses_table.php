<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('postal_code');
            $table->string('phone');
            $table->string('address_detail');
            $table->foreignId('username')->constrained();
            $table->enum('stat_delete', ['0', '1'])
            ->default( '0')->comment('0 = notDeleted, 1 = Deleted');
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
        Schema::dropIfExists('addresses');
    }
}

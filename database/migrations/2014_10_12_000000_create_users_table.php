<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->integer('point');
            $table->timestamp('verified_at')->nullable();
            $table->enum('is_admin', ['0', '1'])
            ->default( '0')->comment('0 = notAdmin, 1 = Admin');
            $table->enum('stat_delete', ['0', '1'])
            ->default( '0')->comment('0 = notDeleted, 1 = Deleted');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->enum('gender', ['0', '1', '2'])
            ->default( '0')->comment('0 = Unassigned, 1 = Male, 2 = Female');
            $table->integer('point');
            $table->timestamp('created_at');
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('updated_at');
            $table->enum('is_admin', ['0', '1'])
            ->default( '0')->comment('0 = notAdmin, 1 = Admin');
            $table->integer('stat_delete');
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

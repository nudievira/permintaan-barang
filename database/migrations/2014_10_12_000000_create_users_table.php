<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->integer('id')->autoIncrement();
            $table->string('name', 45);
            $table->string('NIK', 45)->nullable();
            $table->string('username', 45);
            $table->string('email', 45)->unique();
            $table->string('password')->nullable();
            $table->string('phone', 15)->nullable();
            $table->integer('role')->nullable();
            $table->integer('departement_id')->nullable();
            $table->integer('status')->comment('7: in-activ; 10: activ')->nullable();
            $table->dateTime('created_at')->nullable();

            $table->foreign('departement_id')->references('id')->on('departement');

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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFpbItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fpb_item', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('qty');
            $table->string('note', 100)->nullable();
            $table->integer('fpb_id');
            $table->integer('product_id');
            $table->dateTime('created_at')->nullable();

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('fpb_id')->references('id')->on('fpb');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fpb_item');
    }
}

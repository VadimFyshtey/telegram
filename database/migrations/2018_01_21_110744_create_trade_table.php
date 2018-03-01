<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('image', 255);
            $table->integer('subscribers')->default(0);
            $table->string('url', 255)->unique();
            $table->integer('category_id')->unsigned();
            $table->text('conditions');
            $table->string('contact', 255);
            $table->boolean('pr')->default(0);
            $table->integer('price')->unsigned();
            $table->boolean('status')->default(0);
            $table->boolean('top')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade');
    }
}

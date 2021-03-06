<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('short_content');
            $table->text('content');
            $table->boolean('status')->default(0);
            $table->integer('view')->default(0);
            $table->string('image', 255);
            $table->string('title', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}

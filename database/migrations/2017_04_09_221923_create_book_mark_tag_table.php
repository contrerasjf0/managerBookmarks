<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookMarkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_mark_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_mark_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            //$table->timestamps();
        });

        Schema::table('book_mark_tag', function (Blueprint $table){
            $table->foreign('book_mark_id')->references('id')->on('book_marks');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_mark_tag');
    }
}

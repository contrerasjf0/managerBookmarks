<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareBookMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_book_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bookmark_id')->unsigned();
            $table->integer('share_user_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('share_book_marks', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bookmark_id')->references('id')->on('book_marks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('share_book_marks');
    }
}

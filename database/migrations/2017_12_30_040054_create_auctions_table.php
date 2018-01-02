<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('style');
            $table->string('title');
            $table->integer('year')->unsigned();
            $table->integer('width')->unsigned();
            $table->integer('height')->unsigned();
            $table->integer('depth')->unsigned()->nullable();
            $table->string('description');
            $table->string('condition');
            $table->string('origin');
            $table->string('artwork_image_path');
            $table->string('signature_image_path');
            $table->string('optional_image_path')->nullable();
            $table->integer('min_price')->unsigned();
            $table->integer('max_price')->unsigned();
            $table->integer('buyout_price')->unsigned()->nullable();
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
}

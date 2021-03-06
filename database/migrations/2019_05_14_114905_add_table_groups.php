<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('circle_friend', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('friend_id');
            $table->unsignedBigInteger('circle_id');

            $table->foreign('friend_id')->references('friend_id')->on('friends');
            $table->foreign('circle_id')->references('id')->on('circles')->onDelete('cascade');
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
        Schema::dropIfExists('grp');
        Schema::dropIfExists('friend_group');
    }
}

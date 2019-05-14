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
        Schema::create('grp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('friendship_groups', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('friendship_id');
            $table->unsignedBigInteger('group_id');

            $table->foreign('friendship_id')->references('id')->on('friends');
            $table->foreign('group_id')->references('id')->on('grp')->onDelete('cascade');
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
        Schema::dropIfExists('friendship_groups');
    }
}

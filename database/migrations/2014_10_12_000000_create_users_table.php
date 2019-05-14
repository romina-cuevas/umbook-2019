<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birthday');
            $table->string('career');
            $table->string('slug');
            $table->string('avatar')->default('user.png');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type',['member','admin'])->default('member');
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('friends', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('accepted')->default(0);
            $table->unsignedBigInteger('friend_id')->index();
            $table->unsignedBigInteger('user_id')->index();
        });

        Schema::disableForeignKeyConstraints();

        Schema::table('friends', function(Blueprint $table) {
            $table->foreign('friend_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('friends');
    }
}

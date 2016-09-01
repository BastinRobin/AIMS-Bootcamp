<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('age');
            $table->string('mobile');
            $table->string('profile_pic');
            $table->string('alt_email');
            $table->boolean('is_verified');
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
        Schema::drop('profile');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicropostFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micropost_follow', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('micropost_id')->unsigned()->index();
            $table->timestamps();
    
        
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('micropost_id')->references('id')->on('microposts');
        
            $table->unique(['user_id', 'micropost_id']);
        
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('micropost_follow');
    }
}

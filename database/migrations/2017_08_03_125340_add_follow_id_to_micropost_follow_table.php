<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFollowIdToMicropostFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('micropost_follow', function (Blueprint $table) {
            $table->integer('follow_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('micropost_follow', function (Blueprint $table) {
            $table->dropColumn('follow_id');
        });
    }
}

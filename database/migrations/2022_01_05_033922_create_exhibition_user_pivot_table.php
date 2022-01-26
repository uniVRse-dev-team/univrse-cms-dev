<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitionUserPivotTable extends Migration
{
    public function up()
    {
        Schema::table('exhibitior_user', function (Blueprint $table) {
            $table->unsignedBigInteger('exh_id');
            $table->foreign('exh_id')->references('id')->on('exhibitors')->onDelete('cascade');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}

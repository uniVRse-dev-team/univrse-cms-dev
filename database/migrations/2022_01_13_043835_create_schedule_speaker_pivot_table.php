<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleSpeakerPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_speaker_pivot', function (Blueprint $table) {
            $table->unsignedBigInteger('sch_id');
            $table->foreign('sch_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->unsignedBigInteger('member_id');
            $table->foreign('speaker_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_speaker_pivot');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('sch_start_time');
            $table->datetime('sch_end_time');
            $table->string('sch_title');
            $table->string('sch_description');
            $table->string('sch_pic');
            $table->string('sch_venue');
            $table->string('sch_price')->nullable();
            $table->string('sch_max_pax');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitorsTable extends Migration
{
    public function up()
    {
        Schema::create('exhibitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exh_register')->unique();
            $table->string('exh_name');
            $table->string('exh_venue');
            $table->string('exh_adr_1');
            $table->string('exh_adr_2');
            $table->string('exh_postcode');
            $table->string('exh_city');
            $table->string('exh_state');
            $table->string('exh_country');
            $table->string('exh_email');
            $table->string('exh_pic');
            $table->string('exh_position');
            $table->string('exh_office')->nullable();
            $table->string('exh_mobile');
            $table->string('exh_template');
            $table->string('exh_color1');
            $table->string('exh_color2');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

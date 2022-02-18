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
            $table->string('exh_fname');
            $table->string('exh_lname');
            $table->string('exh_email');
            $table->string('exh_contact_no');
            $table->string('exh_jobposition');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

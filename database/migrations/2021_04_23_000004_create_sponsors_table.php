<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('spo_register')->unique();
            $table->string('spo_name');
            $table->string('spo_hall');
            $table->string('spo_adr_1');
            $table->string('spo_adr_2');
            $table->string('spo_postcode');
            $table->string('spo_city');
            $table->string('spo_state');
            $table->string('spo_country');
            $table->string('spo_email');
            $table->string('spo_pic');
            $table->string('spo_position');
            $table->string('spo_office')->nullable();
            $table->string('spo_mobile');
            $table->string('spo_package');
            $table->string('spo_product');
            $table->string('spo_amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

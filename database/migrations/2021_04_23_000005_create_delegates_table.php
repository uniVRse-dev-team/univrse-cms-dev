<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelegatesTable extends Migration
{
    public function up()
    {
        Schema::create('delegates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('del_name');
            $table->string('del_position');
            $table->string('del_office')->nullable();
            $table->string('del_mobile');
            $table->string('del_email');
            $table->string('del_adr_1');
            $table->string('del_adr_2');
            $table->string('del_postcode');
            $table->string('del_city');
            $table->string('del_state');
            $table->string('del_country');
            $table->string('del_speaker')->nullable();
            $table->string('del_twitter')->nullable();
            $table->string('del_linkedin')->nullable();
            $table->string('del_facebook')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

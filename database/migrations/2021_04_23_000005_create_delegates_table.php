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
            $table->string('del_fname');
            $table->string('del_lname');
            $table->string('del_email');
            $table->string('del_contact_no');
            $table->string('del_companyname');
            $table->string('del_jobposition');
            $table->string('del_state');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

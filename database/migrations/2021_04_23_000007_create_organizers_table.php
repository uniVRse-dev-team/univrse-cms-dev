<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizersTable extends Migration
{
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('org_register')->unique();
            $table->string('org_name');
            $table->string('org_adr_1');
            $table->string('org_adr_2');
            $table->string('org_postcode');
            $table->string('org_city');
            $table->string('org_state');
            $table->string('org_country');
            $table->string('org_email');
            $table->string('org_pic');
            $table->string('org_position');
            $table->string('org_office')->nullable();
            $table->string('org_mobile');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

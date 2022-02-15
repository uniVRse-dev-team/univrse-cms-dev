<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable(); 
            $table->datetime('email_verified_at')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('country')->nullable();
            $table->string('occupation')->nullable();
            $table->int('age')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->country();
            $table->occupation();
            $table->age();
        });
    }
}

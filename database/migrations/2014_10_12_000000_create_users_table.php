<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role', length: 15)->default('admin');
            $table->text('img');
            // $table->unsignedBigInteger('company_id');
            // $table->foreign('company_id')->references('id')->on('companies');
            $table->foreignId('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

   
    }

   
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
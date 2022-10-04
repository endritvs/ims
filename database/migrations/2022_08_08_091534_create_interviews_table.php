<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('interview_id');
            $table->foreignId('interviewer')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('interviewees_id')
                ->references('id')->on('interviewees')
                ->onDelete('cascade');
            $table->datetime('interview_date');
            $table->foreignId('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');
            $table->String('status')->default('pending');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
};
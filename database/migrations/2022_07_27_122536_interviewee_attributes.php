<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('interviewee_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name');
            $table->foreignId('interviewee_type_id')
                ->references('id')->on('interviewee_types')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('interviewee_attributes');
    }
};
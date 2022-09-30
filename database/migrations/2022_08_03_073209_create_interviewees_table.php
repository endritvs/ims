<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('interviewees', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('surname');
            $table->String('cv_path');
            $table->String('external_cv_path');
            $table->string('email')->unique();
            $table->String('img');
            $table->foreignId('interviewee_types_id')
                ->references('id')->on('interviewee_types')
                ->onDelete('cascade');
            $table->boolean('status');
            $table->foreignId('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('interviewees');
    }
};
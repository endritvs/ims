<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->String('interview_name');
            $table->foreignId('interviewer')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('interviewee')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->date('interview_date')->format('d/m/Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
};
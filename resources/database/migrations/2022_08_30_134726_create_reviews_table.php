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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')
                ->references('id')->on('interviewees')
                ->onDelete('cascade');
            $table->foreignId('questionnaire_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
                $table->foreignId('interview_id')
                ->references('id')->on('interviews')
                ->onDelete('cascade');
            $table->integer('rating_amount');
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
        Schema::dropIfExists('reviews');
    }
};

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
        Schema::create('reviews_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')
                ->references('id')->on('interviewees')
                ->onDelete('cascade');
            $table->foreignId('questionnaire_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
                $table->integer('interview_id');
            $table->integer('rating_amount')->default(10);
            $table->foreignId('attribute_id')
                ->references('id')->on('interviewee_attributes')
                ->onDelete('cascade');
            $table->foreignId('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');    
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
        Schema::dropIfExists('reviews_attributes');
    }
};

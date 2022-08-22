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
        Schema::create('interviewees', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('surname');
            $table->String('cv_path');
            $table->String('external_cv_path');
            $table->String('img');
            $table->foreignId('interviewee_types_id')
                ->references('id')->on('interviewee_types')
                ->onDelete('cascade');
            // $table->foreignId('interviewee_attributes_id')
            //     ->references('id')->on('interviewee_attributes')
            //     ->onDelete('cascade');
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
        Schema::dropIfExists('interviewees');
    }
};
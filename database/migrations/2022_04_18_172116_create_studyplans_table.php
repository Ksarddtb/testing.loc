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
        Schema::create('studyplans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_class_id');
            $table->foreign('student_class_id')->references('id')->on('student_classes')->onDelete('cascade');
            $table->unsignedBigInteger('lection_id');
            $table->foreign('lection_id')->references('id')->on('lections')->onDelete('cascade');
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
        Schema::dropIfExists('studyplans');
    }
};

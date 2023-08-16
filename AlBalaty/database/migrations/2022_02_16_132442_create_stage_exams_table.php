<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stage_id');
            $table->unsignedInteger('exam_id');
            $table->timestamps();

            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stage_exams');
    }
}

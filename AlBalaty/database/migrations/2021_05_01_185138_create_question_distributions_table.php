<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_distributions', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('question_id');

            $table->unsignedInteger('path_id')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('part_id')->nullable();
            $table->unsignedInteger('chapter_id')->nullable();
            $table->unsignedInteger('topic_id')->nullable();
            $table->unsignedInteger('skill_id')->nullable();

            $table->timestamps();



            $table->foreign('question_id')
                ->references('id')->on('questions')
                ->onDelete('cascade');
            $table->foreign('path_id')
                ->references('id')->on('paths')
                ->onDelete('cascade');
            $table->foreign('course_id')
                ->references('id')->on('path_courses')
                ->onDelete('cascade');
            $table->foreign('part_id')
                ->references('id')->on('course_parts')
                ->onDelete('cascade');
            $table->foreign('chapter_id')
                ->references('id')->on('part_chapters')
                ->onDelete('cascade');
            $table->foreign('topic_id')
                ->references('id')->on('chapter_topics')
                ->onDelete('cascade');
            $table->foreign('skill_id')
                ->references('id')->on('topic_skills')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_distributions');
    }
}

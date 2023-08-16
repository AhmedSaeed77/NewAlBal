<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExplanationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explanations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');

            $table->unsignedInteger('path_id')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('part_id')->nullable();
            $table->unsignedInteger('chapter_id')->nullable();
            $table->unsignedInteger('topic_id')->nullable();

            $table->unsignedInteger('admin_created_by');
            $table->timestamps();

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
            $table->foreign('admin_created_by')
                ->references('id')->on('admins')
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
        Schema::dropIfExists('explanations');
    }
}

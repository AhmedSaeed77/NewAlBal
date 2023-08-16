<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('topic_id');
            $table->timestamps();

            $table->foreign('topic_id')
                ->references('id')->on('chapter_topics')
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
        Schema::dropIfExists('topic_skills');
    }
}

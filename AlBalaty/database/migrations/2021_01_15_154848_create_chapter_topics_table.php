<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('chapter_id');
            $table->unsignedInteger('admin_created_by');
            $table->timestamps();

            $table->foreign('chapter_id')
                ->references('id')->on('part_chapters')
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
        Schema::dropIfExists('chapter_topics');
    }
}

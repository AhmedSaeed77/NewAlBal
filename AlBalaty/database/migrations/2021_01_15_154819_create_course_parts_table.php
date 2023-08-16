<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('admin_created_by');
            $table->timestamps();

            $table->foreign('course_id')
                ->references('id')->on('path_courses')
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
        Schema::dropIfExists('course_parts');
    }
}

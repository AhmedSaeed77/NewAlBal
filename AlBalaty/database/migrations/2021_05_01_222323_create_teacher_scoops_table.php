<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherScoopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_scoops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('path_id');
            $table->unsignedInteger('course_id');
            $table->timestamps();

            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');
            $table->foreign('path_id')
                ->references('id')->on('paths')
                ->onDelete('cascade');
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
        Schema::dropIfExists('teacher_scoops');
    }
}

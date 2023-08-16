<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('path_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('path_id');
            $table->unsignedInteger('admin_created_by');
            $table->timestamps();

            $table->foreign('path_id')
                ->references('id')->on('paths')
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
        Schema::dropIfExists('path_courses');
    }
}

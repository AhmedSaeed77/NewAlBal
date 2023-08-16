<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('part_id');
            $table->unsignedInteger('admin_created_by');
            $table->timestamps();

            $table->foreign('part_id')
                ->references('id')->on('course_parts')
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
        Schema::dropIfExists('part_chapters');
    }
}

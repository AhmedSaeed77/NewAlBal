<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('passage_id')->nullable();
            $table->text('title');
            $table->text('feedback')->nullable();

            $table->mediumText('img')->nullable();
            $table->tinyInteger('demo')->default(0);
            $table->tinyInteger('important')->default(0);
            $table->unsignedInteger('admin_created_by');
            $table->timestamps();


            $table->foreign('passage_id')
                ->references('id')->on('passages')
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
        Schema::dropIfExists('questions');
    }
}

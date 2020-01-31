<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('lesson_id');

            $table->bigInteger('lesson_course_id')->unsigned()->nullable();
            $table->foreign('lesson_course_id')->references('course_id')->on('courses')->onUpdate('cascade')->onDelete('set null');

            $table->string('lesson_title');
            $table->string('lesson_slug');
            $table->longText('lesson_description');
            $table->Text('lesson_images')->nullable();
            $table->Text('lesson_video');
            $table->Text('lesson_video_time');

            $table->tinyInteger('lesson_status')->default('0')->comment('0 : Published ; 1 : UnPublished ; 2 : draft ; 3 : scheduled ');
            $table->tinyInteger('deleted_status')->default('0')->comment('0 : unDeleted ; 1 : Deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}

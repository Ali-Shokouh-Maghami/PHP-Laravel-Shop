<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->string('course_title');
            $table->string('course_slug');
            $table->longText('course_description');
            $table->Text('course_images')->nullable();
            $table->string('course_teacher');
            $table->string('course_total_time');
            $table->string('course_price')->default('0');
            $table->string('course_like')->default('0');
            $table->tinyInteger('course_status')->default('0')->comment('0 : Published ; 1 : UnPublished ; 2 : draft ; 3 : scheduled ');
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
        Schema::dropIfExists('courses');
    }
}

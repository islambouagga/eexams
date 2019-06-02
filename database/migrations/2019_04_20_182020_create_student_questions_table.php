<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_student');

            $table->unsignedBigInteger('id_Question');

            $table->string('answer');
            $table->timestamps();
        });
        Schema::table('student_questions', function (Blueprint $table) {
            $table->foreign('id_student')->references('id_student')->on('students');
            $table->foreign('id_Question')->references('id_Question')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_questions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id_student')->on('students');
            $table->unsignedBigInteger('id_Exam');
            $table->foreign('id_Exam')->references('id_Exam')->on('exams');
            $table->dateTime('date_passing');
            $table->integer('mark');
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
        Schema::dropIfExists('student_exams');
    }
}

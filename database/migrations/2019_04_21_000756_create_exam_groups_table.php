<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_Exam');
            $table->foreign('id_Exam')->references('id_Exam')->on('exams');
            $table->unsignedBigInteger('id_Group');
            $table->foreign('id_Group')->references('id_Group')->on('groups');
            $table->dateTime('date_scheduling');
            $table->time('Time_limit');
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
        Schema::dropIfExists('exam_groupes');
    }
}

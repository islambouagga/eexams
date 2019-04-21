<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id_student')->on('students');
            $table->unsignedBigInteger('id_Group');
            $table->foreign('id_Group')->references('id_Group')->on('groups');
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
        Schema::dropIfExists('student_groupes');
    }
}

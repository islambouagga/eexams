<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMCChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_c_choices', function (Blueprint $table) {
            $table->bigIncrements('id_m_c_choices');
            $table->unsignedBigInteger('id_m_c_questions');
            $table->foreign('id_m_c_questions')->references('id_m_c_questions')->on('m_c_questions');
            $table->string('choice');
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
        Schema::dropIfExists('m_c_choices');
    }
}

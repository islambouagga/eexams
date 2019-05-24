<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMRChoisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_r_choises', function (Blueprint $table) {
            $table->bigIncrements('id_m_r_choices');
            $table->unsignedBigInteger('id_m_r_questions');
            $table->foreign('id_m_r_questions')->references('id_m_r_questions')->on('m_r_questions');
            $table->string('choice');
            $table->boolean('is_correct')->default('0');
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
        Schema::dropIfExists('m_r_choises');
    }
}

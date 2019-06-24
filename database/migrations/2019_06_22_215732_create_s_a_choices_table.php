<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSAChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_a_choices', function (Blueprint $table) {
            $table->bigIncrements('id_s_a_choices');
            $table->unsignedBigInteger('id_s_a_questions');
            $table->foreign('id_s_a_questions')->references('id_s_a_questions')->on('s_a_questions');
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
        Schema::dropIfExists('s_a_choices');
    }
}

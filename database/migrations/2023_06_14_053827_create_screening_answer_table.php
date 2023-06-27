<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screening_answer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("screening_id");
            $table->unsignedBigInteger("plan_id");
            $table->longText("answer");
            $table->foreign("screening_id")->references("id")->on("screening_questions");
            $table->foreign("plan_id")->references("id")->on("plans");
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
        Schema::dropIfExists('screening_answer');
    }
}

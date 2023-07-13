<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ai_question', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("plan_id");
            $table->unsignedBigInteger('question_category_id');
            $table->json("question");
            $table->json("answer");
            $table->unsignedBigInteger('ai_rating')->nullable();
            $table->unsignedBigInteger('analyst_rating')->nullable();
            $table->foreign("plan_id")->references("id")->on("plans");
            $table->foreign("question_category_id")->references("id")->on("question_category");
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
        Schema::dropIfExists('ai_question');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssesmentAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assesment_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("question_id");
            $table->unsignedBigInteger("plan_id");
            $table->longText("answer");
            $table->foreign("question_id")->references("id")->on("assesment_questions");
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("cascade");
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
        Schema::dropIfExists('assesment_answers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('headquarter')->nullable();
            $table->longText('founders')->nullable();
            $table->longText('team_members')->nullable();
            $table->longText('board_members')->nullable();
            $table->longText('roles')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('right_person')->nullable();
            $table->longText('motivation')->nullable();
            $table->longText('founder')->nullable();
            $table->longText('responsible_idea')->nullable();
            $table->string('status')->default("pending");
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete('cascade');
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
        Schema::dropIfExists('teams');
    }
}

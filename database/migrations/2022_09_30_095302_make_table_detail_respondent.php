<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeTableDetailRespondent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondent_detail', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("respondent_id");
            $table->unsignedBigInteger("question_id");
            $table->string("answer");
            $table->softDeletes();
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
        Schema::table('respondent_detail', function (Blueprint $table) {
            //
        });
    }
}

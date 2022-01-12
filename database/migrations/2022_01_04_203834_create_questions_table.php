<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('question_number');
            $table->text('question_text');
            $table->integer('question_points');
            $table->text('option_one');
            $table->text('option_two');
            $table->text('option_three');
            $table->text('option_four');
            $table->text('correct_answer');
            $table->foreignId('exam_id')->unsigned()->references('id')->on('exams')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->unsigned()->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}

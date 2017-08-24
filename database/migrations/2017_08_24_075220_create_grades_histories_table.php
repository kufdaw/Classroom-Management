<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('student_id');
            $table->integer('teacher_id');
            $table->integer('value');
            $table->string('operation');
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
        Schema::dropIfExists('grades_histories');
    }
}

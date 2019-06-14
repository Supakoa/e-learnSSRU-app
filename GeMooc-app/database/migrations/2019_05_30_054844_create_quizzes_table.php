<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('detail')->nullable();
            $table->text('image')->nullable();
            $table->integer('time')->default(30);
            $table->integer('count_play')->default(0);
            $table->float('rate', 5, 2)->default(0);
            $table->integer('status')->default(0);
            $table->unsignedbigInteger('content_id');
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
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
        Schema::dropIfExists('quizzes');
    }
}

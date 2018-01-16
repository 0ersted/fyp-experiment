<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('audio_id');
            $table->enum('experiment_id', range(1,5));
            $table->enum('experimenter', [1, 2]);
            $table->enum('solution_emotion', [
                'happy',
                'sad',
                'angry',
                'fear',
                'calm'
            ])->nullable();
            $table->enum('solution_tone',[
                'declarative',
                'questionary'
            ])->nullable();
            $table->enum('level', range(0, 4))->nullable();
            $table->boolean('correctness')->default(0);
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
        Schema::dropIfExists('answers');
    }
}

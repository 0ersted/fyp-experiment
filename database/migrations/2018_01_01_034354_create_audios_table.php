<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->enum('experimenter', [1, 2]);
            $table->enum('experiment', range(1,7));
            $table->enum('emotion', [
                'happy',
                'sad',
                'angry',
                'fear',
                'calm'
            ])->nullable();
            $table->enum('tone',[
                'declarative',
                'questionary'
            ])->nullable();
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
        Schema::dropIfExists('audios');
    }
}

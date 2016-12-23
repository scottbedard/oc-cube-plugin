<?php namespace Bedard\Cube\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSolvesTable extends Migration
{
    public function up()
    {
        Schema::create('bedard_cube_solves', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->default('');
            $table->bigInteger('start')->unsigned()->default(0);
            $table->bigInteger('end')->unsigned()->default(0);
            $table->json('scramble');
            $table->json('turns');
            $table->integer('turn_count')->unsigned();
            $table->integer('milliseconds')->unsigned()->default(0)->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bedard_cube_solves');
    }
}

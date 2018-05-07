<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {

            $table->increments('id')->unsigned()->index();
            
            $table->unsignedInteger('category_id');
            
            $table->foreign('category_id')->references('id')->on('categories');
            
            $table->text('title');

            $table->text('text');

            $table->time('timetodo'); 

            $table->boolean('isdone')->default(false);

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
        Schema::dropIfExists('todos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('blogs', function(Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->integer('category_id');
                $table->integer('radio');
                $table->boolean('b1')->default(0);
                $table->boolean('b2')->default(0);
                $table->boolean('b3')->default(0);
                $table->boolean('b4')->default(0);
                $table->boolean('b5')->default(0);
                $table->boolean('b6')->default(0);
                $table->text('details');
                $table->integer('user_id')->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('blogs');
    }
}

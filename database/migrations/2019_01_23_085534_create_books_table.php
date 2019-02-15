<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('edition');
            $table->string('publish_date');
            $table->integer('publisher_id')->unsigned();
            $table->string('coverimage')->nullable();
            $table->text('description')->nullable();
            $table->text('summary')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('publisher_id')
                ->references('id')
                ->on('publishers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('local', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('division', 30);
            $table->string('district', 30);
            $table->string('zone', 30);
            $table->integer('worker_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->timestamps();

            $table->foreign('worker_id')
                ->references('id')->on('workers')
                ->onDelete('cascade');

            $table->foreign('image_id')
                ->references('id')->on('image')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('local');
    }
}

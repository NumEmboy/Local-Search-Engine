<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('churchId', 20);
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('telephone', 13);
            $table->integer('image_id')->unsigned();
            $table->timestamps();

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
        Schema::drop('workers');
    }
}

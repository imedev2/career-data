<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_reqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->longText('message')->nullable();
            $table->string('email');
            $table->boolean('review')->default(false);
            $table->integer('order')->unsigned();
            $table->timestamps();
            $table->string('slug')->unique();
            $table->string('rand_url')->unique();



            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_reqs');
    }
}

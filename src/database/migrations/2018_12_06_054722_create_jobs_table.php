<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->index()->nullable();
            $table->integer('order')->unsigned();
            $table->string('title');
            $table->string('arabic_title');
            $table->longText('description');
            $table->longText('arabic_description');
            $table->integer('no_req');
            $table->boolean('visible')->default(true);
            $table->date('up_date')->nullable();
            $table->string('slug')->unique();
            $table->string('rand')->unique();
            $table->timestamps();


            $table->foreign('company_id')->references('id')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jobs');
    }
}

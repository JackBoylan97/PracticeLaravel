<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('courses', function (Blueprint $table) { // Maps to Course.php
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('tee_time_interval')->default(10 /* 10 minutes */); // how far apart can the bookings be
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) { // Maps to Booking.php
            $table->bigIncrements('id');
            $table->string('email', 255); // this will link to the users table as a FK
            $table->string('phone', 30)->nullable(); // this will be null if they are register
            $table->integer('persons');
            $table->dateTime('tee_time'); // Time the booking tees off at
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->timestamps(); //created_at updated_at
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        // Modify the users table to add a phone number
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_tables');
    }
}

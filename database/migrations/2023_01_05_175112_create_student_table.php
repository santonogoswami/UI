<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->string('name', 50)->nullable();
            $table->integer('roll')->nullable();
            $table->string('email', 60)->nullable();
            $table->integer('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('Image')->nullable();
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('class')->onDelecte('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}

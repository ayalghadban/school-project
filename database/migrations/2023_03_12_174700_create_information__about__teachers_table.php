<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('information__about__teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('birthday_date');
            $table->boolean('gender')->default(0);
            $table->mediumText('national_identity_number');
            $table->string('phone_number');
            $table->longText('University_degree');
            $table->date('date_of_the_beginning_of_teaching_in_the_school');
            $table->integer('duration_of_the_employment_contract');
            $table->double('salary');
            $table->string('photo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information__about__teachers');
    }
};

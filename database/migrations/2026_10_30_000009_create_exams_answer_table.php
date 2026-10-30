<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exams_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('attempt_id');
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('answer_id')->nullable(); // Cho phép null khi thí sinh bỏ trống không chọn đáp án
            $table->timestamps();

            $table->foreign('attempt_id')->references('id')->on('exams_attempt')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams_answer');
    }
};

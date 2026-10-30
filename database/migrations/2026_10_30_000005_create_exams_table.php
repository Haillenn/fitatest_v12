<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exam_name');
            $table->unsignedInteger('subject_id');
            $table->string('date');
            $table->string('time');
            $table->integer('attempt')->default(0);
            $table->string('enterance_id')->nullable();
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};

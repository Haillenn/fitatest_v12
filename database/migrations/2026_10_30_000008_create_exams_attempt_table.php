<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exams_attempt', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_id');
            $table->unsignedBigInteger('user_id'); // Khớp với id() kiểu bigIncrements của bảng users trong Laravel 12
            $table->integer('status')->default(0);
            $table->float('marks')->nullable();
            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams_attempt');
    }
};

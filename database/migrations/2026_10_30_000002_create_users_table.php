<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('gender')->nullable();
            $table->date('birth')->nullable();
            $table->text('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->unsignedInteger('role')->default(3);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

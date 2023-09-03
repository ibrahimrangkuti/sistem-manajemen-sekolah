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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('department_id')->constrained();
            $table->unsignedBigInteger('department_id')->nullable();
            // $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->enum('level', ['X', 'XI', 'XII']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->enum('type', ['Piano', 'Gitaar', 'Zang', 'Drums'])->nullable();
            
            $table->boolean('trail')->default(false);

            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreignId('userID')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('timeslotID')->nullable()->constrained('timeslots')->onDelete('cascade');
            $table->foreignId('feedbackID')->nullable()->constrained('feedback')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['userID']);
            $table->dropForeign(['timeslotID']);
            $table->dropForeign(['feedbackID']);
        });

        Schema::dropIfExists('courses');
    }
};

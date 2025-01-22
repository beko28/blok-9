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
            $table->text('description')->nullable();
            $table->string('duur')->nullable();
            $table->date('startday');
            $table->time('starttime');
            $table->date('endday')->nullable();
            $table->time('endtime')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('feedback_id')->nullable()->constrained('feedback')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['timeslot_id']);
            $table->dropForeign(['feedback_id']);
        });

        Schema::dropIfExists('courses');
    }
};

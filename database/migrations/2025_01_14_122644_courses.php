<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); //dit word een enum dus een keuze van piano gitaar zang drums
            $table->string('trail'); //dit word een bool dus een keuze van ja of nee
            $table->string('description')->nullable();
            $table->timestamps();
            $table->integer('userID')->nullable();
            $table->integer('timeslotID')->nullable();
            $table->integer('feedbackID')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

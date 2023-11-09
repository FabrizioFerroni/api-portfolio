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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion', 1024);
            $table->string('tags');
            $table->string('folder');
            $table->string('imagen');
            $table->boolean('is_online')->default(false);
            $table->boolean('is_private')->default(false);
            $table->string('url_proyecto')->nullable();
            $table->string('url_github')->nullable();
            $table->enum('categoria', ['fullstack', 'frontend', 'backend']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};

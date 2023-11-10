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
        Schema::create('download_cvs', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->unsignedInteger('count')->default(0);
            $table->unsignedBigInteger('cv_id');
            $table->timestamp('last_download_date')->nullable();
            $table->foreign('cv_id')->references('id')->on('cvs')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_cvs');
    }
};

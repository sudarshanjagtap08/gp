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
        Schema::create('aminityids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('aminity_id');
            $table->string('aux1')->nullable();
            $table->string('aux2')->nullable();
            $table->string('aux3')->nullable();
            $table->string('aux4')->nullable();
            $table->string('aux5')->nullable();
            $table->string('aux6')->nullable();
            $table->string('aux7')->nullable();
            $table->string('aux8')->nullable();
            $table->string('aux9')->nullable();
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('aminity_id')->references('id')->on('aminities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aminityids');
    }
};

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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('metatitle')->nullable();
            $table->string('metadescription')->nullable();
            $table->string('metakeyword')->nullable();
            $table->string('canonical')->nullable();
            $table->string('schemacode')->nullable();
            $table->string('aux2')->nullable();
            $table->string('aux3')->nullable();
            $table->string('aux4')->nullable();
            $table->string('aux5')->nullable();
            $table->string('aux6')->nullable();
            $table->string('aux7')->nullable();
            $table->string('aux8')->nullable();
            $table->string('aux9')->nullable();
            $table->string('aux10')->nullable();
            $table->string('aux11')->nullable();
            $table->string('aux12')->nullable();
            $table->string('aux13')->nullable();
            $table->string('aux14')->nullable();
            $table->string('aux15')->nullable();
            $table->string('aux16')->nullable();
            $table->string('aux17')->nullable();
            $table->string('aux18')->nullable();
            $table->string('aux19')->nullable();
            $table->string('aux20')->nullable();
            $table->timestamps();
            $table->unique(['property_id']);
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};

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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobilenumber')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('size')->nullable();
            $table->string('budget')->nullable();
            $table->string('area')->nullable();
            $table->string('aux1')->nullable();
            $table->string('aux2')->nullable();
            $table->string('aux3')->nullable();
            $table->string('aux4')->nullable();
            $table->string('aux5')->nullable();
            $table->string('aux6')->nullable();
            $table->string('aux7')->nullable();
            $table->string('aux8')->nullable();
            $table->string('aux9')->nullable();
            $table->string('aux10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};

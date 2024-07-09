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
        Schema::create('familybuyers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('buyers');
            $table->string('familymembername')->nullable();
            $table->string('familymembernumber')->nullable();
            $table->string('familymemberemail')->nullable();
            $table->string('familymemberfblink')->nullable();
            $table->string('aux_1')->nullable();
            $table->string('aux_2')->nullable();
            $table->string('aux_3')->nullable();
            $table->string('aux_4')->nullable();
            $table->string('aux_5')->nullable();
            $table->string('aux_6')->nullable();
            $table->string('aux_7')->nullable();
            $table->string('aux_8')->nullable();
            $table->string('aux_9')->nullable();
            $table->string('aux_10')->nullable();
            $table->string('aux_11')->nullable();
            $table->string('aux_12')->nullable();
            $table->string('aux_13')->nullable();
            $table->string('aux_14')->nullable();
            $table->string('aux_15')->nullable();
            $table->string('aux_16')->nullable();
            $table->string('aux_17')->nullable();
            $table->string('aux_18')->nullable();
            $table->string('aux_19')->nullable();
            $table->string('aux_20')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familybuyers');
    }
};

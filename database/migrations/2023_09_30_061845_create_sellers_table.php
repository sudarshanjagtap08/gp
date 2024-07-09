<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('user_id')->constrained('users');
            $table->string('mobilenumber')->nullable();
            $table->string('landlinehome')->nullable();
            $table->string('landlineoffice')->nullable();
            $table->string('othermobile')->nullable();
            $table->string('address')->nullable();
            $table->string('addressnew')->nullable();
            $table->string('landmark')->nullable();
            $table->string('area')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('pan_card_upload')->nullable();
            $table->string('adhaar_card_upload')->nullable();
            $table->string('passport_upload')->nullable();
            $table->string('mbl_ll_bill_upload')->nullable();
            $table->string('bankaccno')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bankifsc')->nullable();
            $table->string('bankaccholdername')->nullable();
            $table->string('mode_of_payment_phonepe')->nullable();
            $table->string('mode_of_payment_gpay')->nullable();
            $table->string('mode_of_payment_bank')->nullable();
            $table->string('mode_of_payment_card')->nullable();
            $table->string('whatsappno')->nullable();
            $table->string('fblink')->nullable();
            $table->string('instagramlink')->nullable();
            $table->string('snapchatlink')->nullable();
            $table->string('pinterestlink')->nullable();
            $table->string('websitelink')->nullable();
            $table->string('sellertype')->nullable();
            $table->string('seller_documentid')->nullable();
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
        Schema::dropIfExists('sellers');
    }
};

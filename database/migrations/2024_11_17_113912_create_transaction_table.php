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
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('trans_id');
            $table->timestamp('trans_time')->useCurrent();
            $table->double('trans_payment');
            $table->string('trans_passenger', 100);
            $table->integer('trans_age');
            $table->string('trans_gender', 15);
            $table->unsignedBigInteger('acc_id');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('dest_id');
            $table->unsignedBigInteger('stat_id')->default(1);
            $table->boolean('trans_refunded')->default(0);
            $table->timestamps();

            // Foreign Keys
            $table->foreign('acc_id')->references('acc_id')->on('accomodation');
            $table->foreign('origin_id')->references('origin_id')->on('origin');
            $table->foreign('dest_id')->references('dest_id')->on('destination');
            $table->foreign('stat_id')->references('stat_id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
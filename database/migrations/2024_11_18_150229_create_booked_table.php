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
        Schema::create('booked', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->string('book_by');
            $table->string('book_contact');
            $table->string('book_address');
            $table->string('book_email');
            $table->string('book_name');
            $table->integer('age');
            $table->string('gender');
            $table->date('book_departure');
            $table->string('book_tracker');
            
            $table->unsignedBigInteger('acc_id');
            $table->unsignedBigInteger('origin_id');
            
        
          
            $table->foreign('acc_id')->references('acc_id')->on('accomodation');
            $table->foreign('origin_id')->references('origin_id')->on('origin');  
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked');
    }
};

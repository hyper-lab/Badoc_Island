<?php
// database/migrations/xxxx_xx_xx_create_booked_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedTable extends Migration
{
    public function up()
    {
        Schema::create('booked', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->string('book_by');
            $table->date('book_departure');
            $table->string('book_contact');
            $table->string('book_address');
            $table->string('book_email');
            $table->unsignedBigInteger('accommodation_id')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booked');
    }
}
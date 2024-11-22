<?php
// database/migrations/2024_11_18_155934_create_client_table.php
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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('client_name');
            $table->integer('client_age');
            $table->string('client_gender');
            $table->unsignedBigInteger('booked_id'); // Ensure this is unsigned big integer
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('booked_id')->references('id')->on('booked')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
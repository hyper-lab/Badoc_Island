<?php
// database/migrations/xxxx_xx_xx_create_transactions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique();
            $table->unsignedBigInteger('booked_id');
            $table->decimal('amount', 10, 2); // Total payment
            $table->string('status');
            $table->timestamps();

            $table->foreign('booked_id')->references('id')->on('booked')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
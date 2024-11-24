<?php
// app/Models/Booked.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;

    protected $table = 'booked'; // Specify the correct table name

    protected $fillable = [
        'booking_id', 'book_by', 'book_departure', 'book_contact', 'book_address', 'book_email', 'accommodation_id', 'status'
    ];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class, 'accommodation_id', 'acc_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'booked_id', 'id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function calculateTotalPayment()
    {
        $accommodation = $this->accommodation;
        $num_clients = $this->clients()->count();
        return $accommodation ? $accommodation->acc_price * $num_clients : 0;
    }
}
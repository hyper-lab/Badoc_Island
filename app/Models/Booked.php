<?php
// app/Models/Booked.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;

    protected $table = 'booked';

    protected $fillable = [
        'booking_id', 'book_by', 'book_departure', 'book_contact', 'book_address', 'book_email', 'accommodation_id'
    ];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class, 'accommodation_id', 'acc_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'booked_id', 'id');
    }
}
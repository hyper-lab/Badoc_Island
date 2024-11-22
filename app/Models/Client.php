<?php
// app/Models/Client.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name', 'client_age', 'client_gender', 'booked_id'
    ];

    public function booked()
    {
        return $this->belongsTo(Booked::class, 'booked_id', 'id');
    }
}
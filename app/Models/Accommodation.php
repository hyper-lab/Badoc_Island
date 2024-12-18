<?php
// app/Models/Accommodation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $primaryKey = 'acc_id';

    protected $fillable = [
        'acc_type', 'acc_slot', 'acc_price'
    ];

    public function decrementSlot()
    {
        if ($this->acc_slot > 0) {
            $this->decrement('acc_slot');
        }
    }
}
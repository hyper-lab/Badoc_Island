<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'accomodation';

    // Specify the primary key of the table
    protected $primaryKey = 'acc_id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'acc_type',
        'acc_price',
        'acc_slot',
    ];

    // Specify any attributes that should be cast to native types
    protected $casts = [
        'acc_price' => 'double',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'trans_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trans_time',
        'trans_payment',
        'trans_passenger',
        'trans_age',
        'trans_gender',
        'acc_id',
        'trans_refunded',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trans_time' => 'datetime',
        'trans_payment' => 'double',
        'trans_refunded' => 'boolean',
    ];

    /**
     * Get the accommodation associated with the transaction.
     */
    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class, 'acc_id', 'acc_id');
    }
}
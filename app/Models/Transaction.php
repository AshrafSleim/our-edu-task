<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public static $status = [
        1 => 'authorized',
        2 => 'decline',
        3 => 'refunded'
    ];
    protected $fillable = [
        'user_id',
        'paid_amount',
        'currency',
        'status_code',
        'payment_date',
        'parent_identification',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

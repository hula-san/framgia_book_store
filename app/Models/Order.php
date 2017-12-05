<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'receive_address',
       	'receive_phone',
        'description',
        'total_price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderBooks()
    {
        return $this->hasMany(OrderBook::class);
    }
}

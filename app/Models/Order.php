<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'Orders';

    protected $appends = ['total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(Orderitem::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->orderItems->sum('price');
    }
}

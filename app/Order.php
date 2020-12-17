<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function OrderItem()
    {
        return $this->belongsTo('App\OrderItem', 'order_id');
    }
}

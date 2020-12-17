<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];

    public function Item()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }

    public function Size()
    {
        return $this->belongsTo('App\Size', 'size_id');
    }

    public function DoorType()
    {
        return $this->belongsTo('App\DoorType', 'door_type_id');
    }

    public function Order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }
}

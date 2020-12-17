<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
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
}

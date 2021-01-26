<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function item()
    {
        return $this->belongsToMany(Product::class, 'order_item', 'order_id','product_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $guarded = ['created_at', 'updated_at'];
}

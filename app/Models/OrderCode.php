<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCode extends Model
{
    public $timestamps = [ "created_at" ];
    protected $guarded = ["created_at"];
    const UPDATED_AT = null;
}

<?php

namespace App\Http\Traits;

trait ActiveTrait
{
    public static function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}

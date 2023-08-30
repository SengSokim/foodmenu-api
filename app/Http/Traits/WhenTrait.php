<?php

namespace App\Http\Traits;
use App\Helpers\DateHelper;

trait WhenTrait
{
    public function scopeWhenWhere($query, $key, $value)
    {
        if(!isset($value)) {
            return;
        }

        $query->where($key, $value);
    }

    public function scopeWhenWhereOrArray($query, $key, $value)
    {
        if(!isset($value)) {
            return;
        }

        if(is_array($value)) {
            return $query->whereIn($key, $value);
        }

        $query->where($key, $value);
    }

    public function scopeWhenWhereDate($query, $key, $comparison, $value)
    {
        if(!isset($value)) {
            return;
        }
        
        $query->whereDate($key, $comparison, $value);
    }

    public function scopeWhenWhereIn($query, $when, $key, $values = [])
    {
        if(!$when) {
            return;
        }

        $query->whereIn($key, $values);
    }

    public function scopeWhenWhereNullOrNot($q, $key, $value)
    {
        if(!isset($value)) {
            return;
        }

        if($value) {
            $q->where($key, '<>', null);
        } else {
            $q->whereNull($key);
        }
    }
}

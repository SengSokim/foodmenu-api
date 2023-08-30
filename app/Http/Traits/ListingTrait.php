<?php

namespace App\Http\Traits;

trait ListingTrait
{
    public function scopeSortList($q, $params)
    {
        $q->orderBy($params['order'], $params['sort']);

        if($params['order'] != 'id' && $params['order'] != $this->getTable() . '.id') {
            $q->orderBy('id', $params['sort']);
        }
    }

    public function scopeOffsetLimit($q, $params)
    {
        if(!isset($params['export']) || !$params['export']) {
            $q->offset($params['offset'])->limit($params['limit']);
        }

        return $q->get();
    }

    public function scopeOffsetLimitTotal($q, $params)
    {
        $total = $q->count();

        if($total == 0) {
            return ['list' => collect([]), 'total' => 0];
        }

        if(!isset($params['export']) || !$params['export']) {
            $list = $q->offsetLimit($params);
        } else {
            $list = $q->get();
        }

        return compact('list', 'total');
    }

    public function scopeSortLimitTotal($q, $params)
    {
        $total = $q->count();

        if($total == 0) {
            return ['list' => collect([]), 'total' => 0];
        }

        if(!isset($params['export']) || !$params['export']) {
            $list = $q->sortList($params)->offsetLimit($params);
        } else {
            $list = $q->sortList($params)->get();
        }

        return compact('list', 'total');
    }

    public function scopeLimitTotal($q, $params)
    {
        $total = $q->count();

        if($total == 0) {
            return ['list' => collect([]), 'total' => 0];
        }

        if(!isset($params['export']) || !$params['export']) {
            $list = $q->offsetLimit($params);
        } else {
            $list = $q->get();
        }

        return compact('list', 'total');
    }

    public function scopeSortLimit($q, $params)
    {
        if(isset($params['export']) && $params['export']) {
            return $q->sortList($params)->get();
        }
         
        return $q->sortList($params)->offsetLimit($params);
    }
}

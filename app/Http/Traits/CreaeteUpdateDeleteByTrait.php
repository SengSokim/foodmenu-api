<?php

namespace App\Http\Traits;

use DB;

trait CreaeteUpdateDeleteByTrait
{
    public static function bootCreaeteUpdateDeleteByTrait()
    {
        static::creating(function ($table) {
            if(auth()->check()) {
                $table->created_by_id = auth()->id();
                $table->created_by_type = get_class(auth()->user());
            }
        });

        static::updating(function ($table) {
            if(auth()->check()) {
                $table->updated_by_id = auth()->id();
                $table->updated_by_type = get_class(auth()->user());
            }
        });

        static::deleting(function ($table) {
            if(auth()->check()) {
                $table->update([
                    'deleted_by_id' => auth()->id(),
                    'deleted_by_type' => get_class(auth()->user())
                ]);
            }
        });
    }

    public function created_by()
    {
        return $this->morphTo();
    }

    public function updated_by()
    {
        return $this->morphTo();
    }

    public function deleted_by()
    {
        return $this->morphTo();
    }
}

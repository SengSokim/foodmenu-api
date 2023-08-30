<?php

namespace App\Http\Traits;

use App\Models\Media;

trait MediaTrait
{
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    public function getUrlAttribute($value)
    {
        if(config('media.is_aws_s3')) {
            if(substr($value, 0, 1) == '/') {
                $value = substr($value, 1);  
            }

            return Storage::disk('s3')->url($value);
        } else {
            return url('') . $value;
        }
    }

    public static function store($name, $folder)
    {
        return self::create([
            'url'	=> "/uploads/{$folder}/". $name,
            'name'	=> $name
        ]);
    }
}

<?php

namespace App\Helpers;

use App\Models\Media;
use Storage;

class MediaHelper
{
    public static function checkByUrl($url)
    {
        $url = parse_url($url);

        $media = Media::where('url', $url['path'])->first();

        if (!$media) {
            return null;
        }

        return $media->id;
    }

    public static function store($data, $ext, $name, $folder)
    {
        if (!strpos($data, 'base64')) {
            return self::checkByUrl($data);
        }

        if ($ext) {
            if ($name) {
                $name .= '-';
            }

            $name .= uniqid(rand()) . time() . '.' . $ext;
        } else {
            $name = uniqid(rand()) . time() . $name;
        }

        storeFile($name, $folder, base64_decode(explode(',', $data)[1] ?? ''));

        $media = Media::store($name, $folder);

        return $media->id;
    }

    public static function storeImage($data, $ext = 'png', $name = null)
    {
        return self::store($data, $ext, null, 'images');
    }

    public static function storeFile($data, $ext, $name = null)
    {
        return self::store($data, $ext, $name, 'files');
    }
}

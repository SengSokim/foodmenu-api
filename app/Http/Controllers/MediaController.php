<?php

namespace App\Http\Controllers;

use App\Models\Media;

class MediaController extends Controller
{
    public function getIdByUrl()
    {
        $url = parse_url(request('url'));

        $item = Media::where('url', $url['path'])->first();

        if(!$item) {
            return fail('Not found');
        }

        return success([
            'id' => $item->id
        ]);
    }
}

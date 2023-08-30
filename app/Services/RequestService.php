<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RequestService
{
    protected $method;
    protected $params;
    protected $key_param;
    protected $base_url;
    protected $end_point;
    protected $headers = [];

    public function request($is_array = false)
    {

        $res = Http::send($this->method, $this->base_url . $this->end_point, [
            'headers' => $this->headers,
            'verify' => false,
            $this->key_param => $this->params
        ]);

        if($is_array) {
            return $res->json();
        }

        return $res->object();
    }

    public function toArray()
    {
        return $this->request(true);
    }
}

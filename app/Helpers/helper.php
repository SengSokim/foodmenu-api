<?php

use App\Models\User;

function get_message($key, $word = "not_found")
{
    return __("messages." . $word, ["attribute" => ucwords(get_validation_attribute($key))]);
}

function get_validation_attribute($key)
{
    if(__("validation.attributes." . $key) == "validation.attributes." . $key) {
        return $key;
    }

    return __("validation.attributes." . $key);
}

function success($data = null)
{
    return response()->json(["success" => true, "data" => $data]);
}

function fail($message = null, $code = 400)
{
    return response()->json(["success" => false, "message" => $message], $code);
}

function isJsonAndGet($string) {
    $data = json_decode($string);

    return json_last_error() == JSON_ERROR_NONE ? $data : false;
}

function prefix_number_format($number, $prefix = null, $is_start = true, $decimal = 0, $dec_point = ".", $thousads_sep = ",")
{
    if($decimal < 0) {
        $number = substr($number, 0, $decimal);
        foreach(range(1, -$decimal) as $index) {
            $number .= 0;
        }

        $decimal = 0;
    }

    $return = number_format($number, $decimal, $dec_point, $thousads_sep);

    if($prefix) {
        if($is_start) {
            $return = $prefix . $return;
        } else {
            $return .= $prefix;
        }
    }

    return $return;
}

function dollar($number, $prefix = "$ ", $decimal = 2)
{
    return prefix_number_format($number, $prefix, true, $decimal);
}

function riel($number, $prefix = "៛", $decimal = -2)
{
    return prefix_number_format($number, $prefix, false, $decimal);
}

function random4digit()
{
    return rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
}

function random6digit()
{
    return rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
}

function storeFile($file, $folder, $content)
{
    if(config("media.is_aws_s3")) {
        Storage::disk("s3")->put("uploads/${folder}/" . $file, $content, "public");
    } else {
        file_put_contents(public_path("uploads/") .  "${folder}/" . $file, $content);
    }
}

function getUserTypeString($class, $default = null)
{
    switch($class) {
        case User::class;
            return 'user';
    }

    return $default;
}

function getUserTypeClass($string, $default = null)
{
    switch($string) {
        case 'user';
            return User::class;
    }

    return $default;
}

function listParams($order = 'created_at', $sort = 'desc', $limit = 10)
{
    return [
        'offset' => request('offset') ?? 0,
        'limit' => request('limit') ?? $limit,
        'search' => request('search'),
        'order' => request('order') ?? $order,
        'sort' => request('sort') ?? $sort,
        'export' => request('export') ?? false
    ];
}

function moreParams($more_params)
{
    $params = [];

    foreach ($more_params as $param) {
        $params[$param] = request($param);
    }

    return $params;
}

function distance($lat1, $lon1, $lat2, $lon2, $unit = "METER")
{
    $dist = rad2deg(acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1 - $lon2))));

    switch(strtoupper($unit)) {
        case "K":
            $value = 111.18;
            break;
        case "METER":
            $value = 111180;
            break;
        case "N":
            $value = 59.997756;
            break;
        default:
            $value = 69.09;
    }

    return $dist * $value;
}

function getWeeklyString($key) {
    switch($key) {
        case 0:
            return 'sunday';
        case 1:
            return 'monday';
        case 2:
            return 'tuesday';
        case 3:
            return 'wednesday';
        case 4:
            return 'thursday';
        case 5:
            return 'friday';
        case 6:
            return 'saturday';
    }

    return null;
}

function endsWith( $haystack, $needle ) {
    $length = strlen( $needle );
    if( !$length ) {
        return true;
    }
    return substr( $haystack, -$length ) === $needle;
}

/**
 * Convert English number to Khmer number
 *
 * @param $number
 * @return string
 */
function numberEngToKhmer($number)
{
    $arr = [
        0 => '០',
        1 => '១',
        2 => '២',
        3 => '៣',
        4 => '៤',
        5 => '៥',
        6 => '៦',
        7 => '៧',
        8 => '៨',
        9 => '៩'
    ];

    $num = array_map(function ($str) use ($arr) {
        return $arr[$str] ?? $str;
    }, str_split($number));

    return implode('', $num);
}

/**
 * Convert English number to Khmer number
 *
 * @param $number
 * @return string
 */
function numberKhmerToEng($number)
{
    $arr = [
        0 => '០',
        1 => '១',
        2 => '២',
        3 => '៣',
        4 => '៤',
        5 => '៥',
        6 => '៦',
        7 => '៧',
        8 => '៨',
        9 => '៩'
    ];

    $num = array_map(function ($str) use ($arr) {
        $key = array_search($str, $arr);
        return $key ? $key : $str;
    }, mb_str_split($number));

    return implode('', $num);
}


function getNextQuotationNo() {
    $item = App\Models\Setting::first();

    $item->update([
        'quotation_no' => ++$item->quotation_no
    ]);

    return 'iQ'.now()->format('y').'-'.sprintf('%05d', $item->quotation_no);
}

function formatCurrency($money, $code = 'usd')
{
    switch ($code) {
        case 'riel':
        case 'khr':
            return number_format($money, 0, '', ',') . ' ៛';
        default:
            return '$' . number_format($money, 2, '.', ',');
    }
}

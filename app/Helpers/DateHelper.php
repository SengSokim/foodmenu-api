<?php

namespace App\Helpers;

use Carbon\Carbon;
use Exception;

class DateHelper
{
    public static function parseDateTimeMobile($datetime)
    {
        return self::format($datetime, config('format.clock.app.date_time'));
    }

    public static function parseDateMobile($date)
    {
        return self::format($date, config('format.clock.app.date'));
    }


    public static function parseTimeMobile($time)
    {
        return self::format($time, config('format.clock.app.time'));
    }

    public static function parseDateTimeWebsite($datetime)
    {
        return self::format($datetime, config('format.clock.website.date_time'));
    }

    public static function parseDateWebsite($date)
    {
        return self::format($date, config('format.clock.website.date'));
    }

    public static function parseTimeWebsite($time)
    {
        return self::format($time, config('format.clock.website.time'));
    }

    public static function format($datetime, $format)
    {
        if (!$datetime) {
            return null;
        }

        if (auth('client_users')->check() && auth('client_users')->user()->client->setting->date_format_php != 'Y-m-d' && $format == 'Y-m-d') {
            try {
                return Carbon::createFromFormat(auth('client_users')->user()->client->setting->date_format_php, $datetime)->format($format);
            } catch (Exception $e) {
            }
        }

        try {
            return Carbon::parse($datetime)->format($format);
        } catch (Exception $e) {
            return null;
        }
    }
}

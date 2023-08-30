<?php

namespace App\Helpers;

use App\Models\Notification;
use DB;
use App\Models\NotificationPlayer;
use Illuminate\Support\Facades\Http;

class NotificationHelper
{
    public static function checkPlayerId($player_id, $user_type)
    {
        $app_id = config('onesignal.'. getUserTypeString($user_type, $user_type) .'.app_id');

        $url = config('onesignal.request.base_url') . "/" . config('onesignal.request.player') . "/$player_id?app_id=$app_id";

        $response = Http::timeout(config('onesignal.request.timeout'))->get($url)->body();

        if(!is_string($response)) {
            return false;
        }

        return !isset(json_decode($response)->errors);
    }

    public static function request($user_type, $filters, $data, $include_player_ids = null)
    {
        $fields = [
            'app_id' => config('onesignal.'. getUserTypeString($user_type, $user_type) .'.app_id'),
            'filters' => $filters,
            'data' => $data,
            'contents' => $data['message'],
            'headings' => $data['title'],
            'ios_badgeCount' => 1,
            'ios_badgeType' => 'Increase',
            'small_icon' => 'ic_noti_logo',
            'content_available' => 1,
            'url' => $data['url'] ?? null,
            'ios_attachments' => $data['ios_attachments'] ?? null,
            'big_picture' => $data['big_picture'] ?? null,
            'huawei_big_picture' => $data['huawei_big_picture'] ?? null,
            'chrome_web_image' => $data['chrome_web_image'] ?? null,
            'adm_big_picture' => $data['adm_big_picture'] ?? null,
            'chrome_big_picture' => $data['chrome_big_picture'] ?? null,
        ];

        if($include_player_ids) {
            foreach(array_chunk($include_player_ids, 2000) as $player_ids) {
                $fields['include_player_ids'] = $player_ids;

                Http::contentType('application/json; charset=utf-8;')
                ->withHeaders([
                    'Authorization' => 'Basic ' . config('onesignal.'. getUserTypeString($user_type, $user_type)  .'.app_key')
                ])
                ->timeout(config('onesignal.request.timeout'))
                ->post(config('onesignal.request.base_url') . "/" . config('onesignal.request.notification'), $fields);

            }
        } else {
            Http::contentType('application/json; charset=utf-8;')
                ->withHeaders([
                    'Authorization' => 'Basic ' . config('onesignal.'. getUserTypeString($user_type, $user_type)  .'.app_key')
                ])
                ->timeout(config('onesignal.request.timeout'))
                ->post(config('onesignal.request.base_url') . "/" . config('onesignal.request.notification'), $fields);
        }
    }

    public static function send($user_type, $user_ids, $data)
    {
        $is_app = in_array($user_type, [Employee::class]);

        $player_ids = NotificationPlayer::when(isset($user_ids[0]) && $user_ids[0] != null, function($q) use($user_ids) {
                                            $q->whereIn('user_id', $user_ids);
                                        })
                                        ->where('user_type', $user_type)
                                        ->when($is_app, function($q) {
                                            $q->where('locale', '<>', 'en');
                                        })
                                        ->pluck('player_id')
                                        ->toArray();

        $temp_data = $data;

        if($is_app) {
            $temp_data['message'] = null;
            $temp_data['title'] = null;
            $temp_data['message'] = ['en' => $data['message']['kh']];
            $temp_data['title'] = ['en' => $data['title']['kh']];
            self::request($user_type, [], $temp_data, $player_ids);

            $player_ids = NotificationPlayer::when(is_array($user_ids), function($q) use($user_ids) {
                                                    $q->whereIn('user_id', $user_ids);
                                                })
                                                ->when(!is_array($user_ids), function($q) use($user_ids) {
                                                    if($user_ids) {
                                                        $q->where('user_id', $user_ids);
                                                    }
                                                })
                                                ->where('user_type', $user_type)
                                                ->where('locale', 'en')
                                                ->pluck('player_id');

            $temp_data['message'] = null;
            $temp_data['title'] = null;
            $temp_data['message'] = ['en' => $data['message']['en']];
            $temp_data['title'] = ['en' => $data['title']['en']];
        }

        self::request($user_type, [], $temp_data, $player_ids);

        return true;
    }

    public static function createAndSend($user_type, $user_ids, $data, $type = null, $type_id = null)
    {
        Notification::store($user_type, $user_ids, $data, $type, $type_id);

        self::send($user_type, $user_ids, $data);
    }
}

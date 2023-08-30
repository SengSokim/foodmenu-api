<?php

namespace App\Http\Traits;

use App\Models\LogChange;
use Carbon\Carbon;
use DB;

trait LogChangeTrait
{
    public static function getUserData()
    {
        if(auth()->check()) {
            return [
                'user_id' => auth()->id(),
                'user_type' => get_class(auth()->user())
            ];
        }

        return [
            'user_id' => null,
            'user_type' => null
        ];
    }

    public static function bootLogChangeTrait()
    {
        // create a event to happen on updating
        static::updating(function ($table) {
            $log_configs = static::$log_configs ?? [];

            foreach($table->getDirty() as $key => $value) {
                if(isset($log_configs[$key])) {
                    if(isset($log_configs[$key]['except']) && $log_configs[$key]['except']) {
                        continue;
                    }

                    if(isset($log_configs[$key]['time']) && $log_configs[$key]['time'] && Carbon::parse($value)->format('h:i:s') == $old = $table->getOriginal($key)) {
                        continue;
                    }
                }

                $data = [
                    'key' => $key,
                    'old' => $old ?? $table->getOriginal($key),
                    'new' => $value
                ];

                if(isset($log_configs[$key]['id']) && $log_configs[$key]['id']) {
                    $data += [
                        'relate_table' => $log_configs[$key]['relate_table'] ?? null,
                        'show_relate_key' => $log_configs[$key]['show_relate_key'] ?? null,
                    ];
                }

                session()->put('log_change_values.' . $key, $data);
            }
        });

        static::updated(function ($table) {
            if(session()->has('log_change_values')) {
                DB::BeginTransaction();
                    $data = self::getUserData();

                    if (null !== $qs = request()->getQueryString())
                        $qs = '?'.$qs;

                    $log_change = LogChange::create($data + [
                        'log_id' => $table->id,
                        'log_type' => self::class,
                        'type' => 'update',
                        'from' => request()->getBaseUrl().request()->getPathInfo().$qs
                    ]);

                    $log_change->values()->createMany(session()->get('log_change_values'));
                    session()->forget('log_change_values');
                DB::commit();
            }
        });

        // create a event to happen on saving
        static::created(function ($table) {
            DB::BeginTransaction();
                $data = self::getUserData();

                if (null !== $qs = request()->getQueryString())
                    $qs = '?'.$qs;

                LogChange::create($data + [
                    'log_id' => $table->id,
                    'log_type' => self::class,
                    'type' => 'create',
                    'from' => request()->getBaseUrl().request()->getPathInfo().$qs
                ]);
            DB::commit();
        });

        static::deleted(function ($table) {
            DB::BeginTransaction();
                $data = self::getUserData();

                if (null !== $qs = request()->getQueryString())
                    $qs = '?'.$qs;

                LogChange::create($data + [
                    'log_id' => $table->id,
                    'log_type' => self::class,
                    'type' => 'delete',
                    'from' => request()->getBaseUrl().request()->getPathInfo().$qs
                ]);
            DB::commit();
        });
    }
}

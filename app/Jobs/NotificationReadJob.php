<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\NotificationUser;

class NotificationReadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_type;
    protected $user_id;
    protected $type;
    protected $type_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_type, $user_id, $type, $type_id)
    {
        $this->user_type = $user_type;
        $this->user_id = $user_id;
        $this->type = $type;
        $this->type_id = $type_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        NotificationUser::owner($this->user_type, $this->user_id)
                        ->whereHas('notification', function ($q) {
                            $q->where('type', $this->type)
                                ->where('type_id', $this->type_id);
                        })
                        ->update(['read_at' => now()]);
    }
}

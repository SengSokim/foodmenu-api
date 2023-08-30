<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\NotificationHelper;

class NotificationHelperSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_type;
    protected $user_ids;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_type, $user_ids, $data)
    {
        $this->user_type = $user_type;
        $this->user_ids = $user_ids;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        NotificationHelper::send($this->user_type, $this->user_ids, $this->data);
    }
}

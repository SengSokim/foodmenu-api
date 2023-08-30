<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\NotificationHelper;

class NotificationHelperCreateAndSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_type;
    protected $user_ids;
    protected $data;
    protected $type;
    protected $type_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_type, $user_ids, $data, $type = null, $type_id = null)
    {
        $this->user_type = $user_type;
        $this->user_ids = $user_ids;
        $this->data = $data;
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
        NotificationHelper::createAndSend($this->user_type, $this->user_ids, $this->data, $this->type, $this->type_id);
    }
}

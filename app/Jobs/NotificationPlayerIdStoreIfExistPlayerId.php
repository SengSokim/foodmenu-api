<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Models\OperatorUser;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Seller;
use App\Models\NotificationPlayer;

class NotificationPlayerIdStoreIfExistPlayerId implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $player_id;
    protected $user_type;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($player_id, $user_type, $data)
    {
        $this->player_id = $player_id;
        $this->user_type = $user_type;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $is_correct_player_id = NotificationHelper::checkPlayerId($this->player_id, $this->user_type);

        if($is_correct_player_id) {
            NotificationPlayer::updateOrCreate([
                'player_id' => $this->player_id,
                'user_type' => $this->user_type
            ], $this->data);
        }
    }
}

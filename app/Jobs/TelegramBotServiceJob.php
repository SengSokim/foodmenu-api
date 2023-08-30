<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\TelegramBotService;
use PDF;
use File;
use App\Services\Browsershot;

class TelegramBotServiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $type;
    protected $chat_id;
    protected $data;
    protected $reply_to_message_id;
    protected $caption;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $chat_id, $data, $reply_to_message_id = null, $caption = null)
    {
        $this->type = $type;
        $this->chat_id = $chat_id;
        $this->data = $data;
        $this->reply_to_message_id = $reply_to_message_id;
        $this->caption = $caption;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $s = new TelegramBotService();

        $type = $this->type;
        $data = $this->data;

        $s->send($type, $this->chat_id, $data, $this->reply_to_message_id, $this->caption);

        if($this->type == 'pdf') {
            File::delete(public_path($this->data['file_path']));
        }
        else if($this->type == 'browsershot') {
            File::delete(public_path($this->data['path']));
        }
    }
}

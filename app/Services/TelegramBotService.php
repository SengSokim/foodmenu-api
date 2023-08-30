<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class TelegramBotService extends RequestService
{
    public function __construct()
    {
        $this->base_url = "https://api.telegram.org/bot" . config('telegram.bot.token') . '/';
    }

    public function send($type, $chat_id, $data, $reply_to_message_id = null, $caption = null, $option = [])
    {
        switch($type) {
            case 'document':
                $this->sendDocument($chat_id, $data, $caption);

                if($reply_to_message_id) {
                    array_push($this->params, [
                        'contents' => $reply_to_message_id,
                        'name' => 'reply_to_message_id'
                    ]);
                }
                break;
            case 'photo':
                $this->sendPhoto('-882376119', $data, $caption);

                if($reply_to_message_id) {
                    array_push($this->params, [
                        'contents' => $reply_to_message_id,
                        'name' => 'reply_to_message_id'
                    ]);
                }
                break;
            case 'document_url':
                $this->sendDocumentUrl($chat_id, $data, $caption);

                if($reply_to_message_id) {
                    array_push($this->params, [
                        'contents' => $reply_to_message_id,
                        'name' => 'reply_to_message_id'
                    ]);
                }
                break;
            case 'message':
                $this->sendMessage($chat_id, $data);

                if($reply_to_message_id) {
                    $this->params['reply_to_message_id'] = $reply_to_message_id;
                }
                break;
            case 'contact':
                $this->sendContact($chat_id, $data);

                if($reply_to_message_id) {
                    $this->params['reply_to_message_id'] = $reply_to_message_id;
                }
                break;
            case 'forward':
                $this->forwardMessage($chat_id, $data);

                if($reply_to_message_id) {
                    $this->params['reply_to_message_id'] = $reply_to_message_id;
                }
                break;
            default:
                return false;
        }

        if(count($option)) {
            $this->params = $option + $this->params;
        }

        return $this->toArray();
    }

    public function sendDocument($chat_id, $document, $caption = null)
    {
        $this->method = "POST";
        $this->end_point = "sendDocument";
        $this->key_param = 'multipart';
        $this->params = [
            [
                'contents' => $chat_id,
                'name' => 'chat_id'
            ],
            [
                'contents' => fopen($document, 'r'),
                'name' => 'document',
            ],
            [
                'contents' => $caption,
                'name' => 'caption',
            ],
            [
                'contents' => 'HTML',
                'name' => 'parse_mode',
            ]
        ];
    }

    public function sendDocumentUrl($chat_id, $photo, $caption = null)
    {
        $this->method = "POST";
        $this->end_point = "sendDocument";
        $this->key_param = 'form_params';
        $this->params = [
            'chat_id' => $chat_id,
            'document' => $photo,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ];
    }

    public function sendPhoto($chat_id, $photo, $caption = null)
    {
        $this->method = "POST";
        $this->end_point = "sendPhoto";
        $this->key_param = 'form_params';
        $this->params = [
            'chat_id' => $chat_id,
            'photo' => $photo,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ];
    }

    public function sendMessage($chat_id, $text)
    {
        $this->method = "POST";
        $this->end_point = "sendMessage";
        $this->key_param = 'form_params';
        $this->params = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'HTML'
        ];
    }

    public function sendContact($chat_id, $data)
    {
        $this->method = "POST";
        $this->end_point = "sendContact";
        $this->key_param = 'form_params';
        $this->params = [
            'chat_id' => $chat_id,
            'phone_number' => $data['phone'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'parse_mode' => 'HTML'
        ];
    }

    public function forwardMessage($chat_id, $data)
    {
        $this->method = "POST";
        $this->end_point = "forwardMessage";
        $this->key_param = 'form_params';
        $this->params = [
            'chat_id' => $chat_id,
            'from_chat_id' => $data['from_chat_id'],
            'message_id' => $data['message_id']
        ];
    }
}

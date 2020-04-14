<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Jenssegers\Agent\Agent;

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct($messages)
    {
        $agent = new Agent();
        $agent->setUserAgent($messages[0]);
        $message = "{$agent->device()},{$agent->platform()}の{$agent->browser()}ブラウザで";
        $agent = new Agent();
        $agent->setUserAgent($messages[1]);
        $message .= "{$agent->device()},{$agent->platform()}の{$agent->browser()}ブラウザで同時ログインしました。";
        $message .= "再度ログインして下さい。\nまた、見覚えがない場合不正なアクセスが疑われます。パスワードを変更して下さい。";

        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array|\Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        return new Channel('channel-message');
    }
}

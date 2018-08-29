<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\ReplyNotification;

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_content');
    }

    public function created(Reply $reply)
    {
//        $reply->topic()->increment('reply_count', 1);
        $topic = $reply->topic;
        $topic->increment('reply_count', 1);
        $topic->user->notify(new ReplyNotification($reply));
    }
}

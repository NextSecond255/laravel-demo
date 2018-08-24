<?php

namespace App\Observers;

use App\Jobs\TranslateJob;
use App\Models\Topic;
use Carbon\Carbon;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->content = clean($topic->content, 'user_topic_content');
        $topic->excerpt = make_excerpt($topic->content);

//        if (!$topic->slug) {
//            $topic->slug = app(TranslateHandler::class)->translateText($topic->title);
//        }
    }

    public function saved(Topic $topic)
    {
        if (! $topic->slug) {
            // 将翻译的任务推送到队列。
            dispatch(new TranslateJob($topic));
        }
    }
}

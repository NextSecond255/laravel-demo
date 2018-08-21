<?php

namespace App\Observers;

use App\Handlers\TranslateHandler;
use App\Jobs\TranslateJob;
use App\Models\Topic;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->content = clean($topic->content, 'user_topic_content');
        $topic->excerpt = make_excerpt($topic->content);

        if (!$topic->slug) {
            $topic->slug = app(TranslateHandler::class)->translateText($topic->title);
        }
    }
}

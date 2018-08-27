<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ReplyFormRequest;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class repliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ReplyFormRequest $request, Reply $reply)
    {
        $attribute = 'content';
        $reply->content = $request->$attribute;
        $reply->user_id = Auth::id();
        $reply->topic_id = $request->topic_id;
        $reply->save();

        return redirect()
            ->to($reply->topic->link())
            ->with('success', '你的回复创建成功！');
    }
}

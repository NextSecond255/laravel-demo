<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ReplyFormRequest;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class repliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 保存话题
     *
     * @param ReplyFormRequest $request
     * @param Reply $reply
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * 删除话题
     *
     * @param Request $request
     * @param Reply $reply
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destory(Request $request, Reply $reply)
    {
        $this->authorize('destory', $reply);
        $reply->delete();

        return redirect()
            ->to($reply->topic->link())
            ->with('success', '删除回复成功！');
    }
}

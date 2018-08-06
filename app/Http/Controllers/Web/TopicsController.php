<?php

namespace App\Http\Controllers\web;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	/**
	 * 话题列表
	 *
	 * @param Request $request
	 * @param Topic $topic
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index(Request $request, Topic $topic)
    {
//    	$topics = $topic->paginate(20);
	    $topics = $topic->withOrder($request->order)->paginate(20);

    	return view('web.topics.index', compact('topics'));
    }

	/**
	 * 展示话题详情
	 *
	 * @param Request $request
	 * @param Topic $topic
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function show(Request $request, Topic $topic)
    {
    	return view('web.topics.show', compact('topic'));
    }

	/**
	 * 创建话题
	 *
	 * @param Topic $topic
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function create(Topic $topic)
    {
    	$categories = Category::all();
    	return view('web.topics.topic', compact('topic', 'categories'));
    }

    public function update()
    {

    }

    public function store()
    {

    }
}

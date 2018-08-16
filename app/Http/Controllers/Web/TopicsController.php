<?php

namespace App\Http\Controllers\web;

use App\Handlers\ImageHandler;
use App\Http\Requests\Web\TopicFormRequest;
use App\Models\Category;
use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        if (! empty($topic->slug) && $topic->slug !== $request->slug) {
            return redirect($topic->link(), 301);
        }
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

    public function store(TopicFormRequest $request, Topic $topic)
    {
		$topic->fill($request->all());
		$topic->user_id = Auth::id();
		$topic->save();

		return redirect()->to($topic->link())->with(['success' => '话题创建成功！']);
    }

    /**
     * 图片上传
     * @param Request $request
     * @param ImageHandler $images
     *
     * @return array
     * @throws \Exception
     */
    public function upload(Request $request,ImageHandler $images)
    {
        $data = [
            'status' => false,
            'msg' => '上传失败',
            'path' => ''
        ];

        if ($file = $request->uploader) {
            $result = $images->upload($request->uploader, 'topics', Auth::id(), 1024);

            if ($result) {
                $data = [
                    'status' => true,
                    'msg' => '上传成功！',
                    'file_path' => $result['path']
                ];
            }
        }

        return $data;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}

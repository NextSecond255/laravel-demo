<?php
namespace App\Http\Controllers\Web;

use App\Handlers\ImageHandler;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\UserFormRequest;

class UsersController extends Controller
{
	/**
	 * 用户详情页。
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\User         $user
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(Request $request, User $user)
	{
		return view('web.users.show', compact('user'));
	}

	/**
	 * 用户编辑页面
	 *
	 * @param Request $request
	 * @param User $user
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Request $request, User $user)
	{
		return view('web.users.edit', compact('user'));
	}

	/**
	 * 更新用户信息
	 * @param UserFormRequest $request
	 * @param User $user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UserFormRequest $request, User $user, ImageHandler $imageHandler)
	{
		$data = $request->all();

		//头像上传
		if ($request->avatar) {
			$result = $imageHandler->upload($request->avatar, 'avatars', $user->id, 365);
			if ($result) {
				$data['avatar'] = $result['path'];
			}
		}

		$user->update($data);

		return redirect()
			->route('users.show', $user->id)
			->with('success', '个人资料更新成功！');
	}
}

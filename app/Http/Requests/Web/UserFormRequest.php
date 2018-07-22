<?php
/**
 * 用户信息提交表单验证
 *
 * Created by PhpStorm.
 * User: hattie
 * Date: 2018/7/19
 * Time: 下午6:58
 */
namespace App\Http\Requests\Web;

use \Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserFormRequest extends FormRequest
{
	/**
	 * 确定用户是否有权发出请求
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * 验证规则
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'         => 'required|between:2,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
			'email'        => 'required|email',
			'introduction' => 'max:120',
			'avatar'       => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
		];
	}

	/**
	 * 展示信息
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.unique'       => '用户名 已被占用，请重新填写。',
			'name.regex'        => '用户名 只支持英文、数字、横杆和下划线。',
			'name.between'      => '用户名 必须介于 2 - 25 个字符之间。',
			'name.required'     => '用户名 不能为空。',
			'avatar.mimes'      => '头像 必须是 jpeg, bmp, png, gif 格式的图片。',
			'avatar.dimensions' => '头像 的清晰度不够，宽和高需要 200px 以上。',
		];
	}
}
<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class TopicFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    switch ($this->method()) {
		    case 'POST':
		    case 'PUT':
		    case 'PATCH':
			    {
				    return [
					    'title' => 'required|min:3',
					    'content' => 'required|min:6',
					    'category_id' => 'required|numeric',
				    ];
			    }
		    case 'GET':
		    case 'DELETE':
		    default:
			    return [];
	    }
    }

    public function messages()
    {
    	return [
		    'title.min'            => '标题 必须至少三个字符。',
		    'content.min'             => '文章内容 必须至少六个字符。',
		    'content.required'        => '内容 不能为空。',
		    'category_id.required' => '分类 必须选择。',
	    ];
    }
}

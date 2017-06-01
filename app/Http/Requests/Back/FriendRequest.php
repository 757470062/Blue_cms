<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class FriendRequest extends FormRequest
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
        return [
            'name' => 'required|unique:friends',
            'link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请填写合作商名称',
            'name.unique' => '合作商名称已存在',
            'link.required' => '请填写合作商网站地址'
        ];
    }
}

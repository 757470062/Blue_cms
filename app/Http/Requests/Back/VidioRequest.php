<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class VidioRequest extends FormRequest
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
            'name' => 'required|unique:vidios',
            'category_id' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '请填写视频集名称',
            'name.unique' => '视频集名称已存在',
            'category_id.required' => '请选择栏目分类'
        ];
    }
}

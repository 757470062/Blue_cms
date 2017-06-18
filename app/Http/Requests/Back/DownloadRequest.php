<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class DownloadRequest extends FormRequest
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
            'name' => 'required|unique:downloads',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请填写资料名称',
            'name.unique' => '该资料名称已存在',
            'category_id.required' => '请选择栏目分类'
        ];
    }

}

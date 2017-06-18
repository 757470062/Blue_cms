<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class VidioSourceRequest extends FormRequest
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
            'name' => 'required|unique:vidio_sources',
            'definition' => 'required',
            'src' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '请填写视频名称',
            'name.unique' => '该视频名称已存在',
            'definition.required' => '请选择视频清晰度',
            'src.required' => '请上传视频资源'
        ];
    }

}

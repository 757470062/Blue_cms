<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name' => 'required|unique:tags'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '请填写TAG名称',
            'name.unique' => '该TAG已经存在'
        ];
    }
}

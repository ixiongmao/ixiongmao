<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class QuDongRequest extends Request
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
        return[
                'file_name' => 'required|unique:qudongs,qudong_name',
            ];
    }



    public function messages()
    {
    return [
        'file_name.required' => '名称是必填的',
        'file_name.unique' => '名称已存在',
      ];
   }
}

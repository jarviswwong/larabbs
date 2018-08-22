<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "gender" => "required",
            "introduction" => "max:50"
        ];
    }

    public function messages()
    {
        return [
            "introduction.max" => "个人简介必须小于50个字"
        ];
    }
}

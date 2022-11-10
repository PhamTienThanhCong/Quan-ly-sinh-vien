<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createKhoaRequest extends FormRequest
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
            'ma_khoa' => 'required|alpha_dash|max:15',
            'ten_khoa' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ten_khoa.required' => 'Vui lòng nhập tên khoa',
            'ma_khoa.required' => 'Vui lòng nhập mã khoa',
            'ma_khoa.alpha_dash' => 'Vui lòng không bao gồm dấu cách',
            'ma_khoa.max' => 'Vui lòng nhập tối đa 15 ký tự',
        ];
    }
}

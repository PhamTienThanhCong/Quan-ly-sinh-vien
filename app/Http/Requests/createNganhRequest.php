<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createNganhRequest extends FormRequest
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
            'ma_nganh' => 'required|alpha_dash|max:15',
            'ten_nganh' => 'required',
            'ma_khoa' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ten_nganh.required' => 'Vui lòng nhập tên chuyên ngành',
            'ma_nganh.required' => 'Vui lòng nhập mã chuyên ngành',
            'ma_nganh.alpha_dash' => 'Vui lòng không bao gồm dấu cách',
            'ma_nganh.max' => 'Vui lòng nhập tối đa 15 ký tự',
            'ma_khoa.required' => 'Vui lòng chọn khoa',
        ];
    }
}

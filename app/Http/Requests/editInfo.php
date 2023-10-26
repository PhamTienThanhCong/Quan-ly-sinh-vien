<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editInfo extends FormRequest
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
            'ho_ten' => 'required',
            'ngay_sinh' => 'required',
            'gioi_tinh' => 'required',
            'so_dien_thoai' => 'required|numeric',
            'dia_chi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Họ tên không được để trống',
            'ngay_sinh.required' => 'Ngày sinh không được để trống',
            'gioi_tinh.required' => 'Giới tính không được để trống',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống',
            'so_dien_thoai.numeric' => 'Số điện thoại phải là số',
            'dia_chi.required' => 'Địa chỉ không được để trống',
        ];
    }
}

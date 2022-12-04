<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMonHocRequest extends FormRequest
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
            'ma_mon_hoc' => 'required|unique:mon_hocs,ma_mon_hoc',
            'ten_mon_hoc' => 'required',
            'so_tin_chi' => 'required',
            'ma_khoa' => 'required',
            'ki_hoc' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ma_mon_hoc.required' => 'Mã môn học không được để trống',
            'ma_mon_hoc.unique' => 'Mã môn học đã tồn tại',
            'ten_mon_hoc.required' => 'Tên môn học không được để trống',
            'so_tin_chi.required' => 'Số tín chỉ không được để trống',
            'ma_khoa.required' => 'Khoa không được để trống',
            'ki_hoc.required' => 'Kì học không được để trống',
        ];
    }
}

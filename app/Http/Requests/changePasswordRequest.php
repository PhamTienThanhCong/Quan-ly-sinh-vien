<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changePasswordRequest extends FormRequest
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
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ];
    }

    public function messages()
    {
        return [
            'oldPassword.required' => 'Mật khẩu cũ không được để trống',
            'newPassword.required' => 'Mật khẩu mới không được để trống',
            'confirmPassword.required' => 'Xác nhận mật khẩu không được để trống',
            'confirmPassword.same' => 'Xác nhận mật khẩu không khớp'
        ];
    }
}

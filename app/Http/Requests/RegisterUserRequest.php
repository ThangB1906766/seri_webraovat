<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email,' .$this->id,
            'phone' => 'required',
            'password' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'email.unique' => 'Email đã tồn tại!',
            'email.required' => 'Email không được để trống!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'password.required' => 'Mật khẩu thoại không được để trống!',

        ];
    }
}

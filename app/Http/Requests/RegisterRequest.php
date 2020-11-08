<?php

namespace App\Http\Requests;

class RegisterRequest extends BaseApiRequest
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
            'full_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => __('app.user.full_name'),
            'email'    => __('app.user.email'),
            'password' => __('app.user.password'),
        ];
    }
}

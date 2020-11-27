<?php

namespace App\Http\Requests;

class LoginRequest extends BaseApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'email'    => __('app.user.email'),
            'password' => __('app.user.password'),
        ];
    }
}

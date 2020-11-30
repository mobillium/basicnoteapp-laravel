<?php

namespace App\Http\Requests;

class ForgotPasswordRequest extends BaseApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
        ];
    }

    public function attributes()
    {
        return [
            'email' => __('app.user.email'),
        ];
    }
}

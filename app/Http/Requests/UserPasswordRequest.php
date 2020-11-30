<?php

namespace App\Http\Requests;

class UserPasswordRequest extends BaseApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required',
            'new_password' => 'required|confirmed|min:6|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'password' => __('app.user.password'),
            'new_password' => __('app.user.password'),
        ];
    }
}

<?php

namespace App\Http\Requests;

class UserRequest extends BaseApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->user();
        return [
            'full_name' => 'max:255',
            'email' => 'email|unique:users,email,'.$user->id,
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => __('app.user.full_name'),
            'email'    => __('app.user.email'),
        ];
    }
}

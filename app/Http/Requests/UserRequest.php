<?php

namespace App\Http\Requests;

class UserRequest extends BaseApiRequest
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
            'full_name' => 'max:255',
            'email' => 'email|unique:users,email',
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

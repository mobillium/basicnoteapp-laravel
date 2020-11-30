<?php

namespace App\Http\Controllers;

use App\Constants\ErrorCode;
use App\Constants\SuccessCode;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function show(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->error(ErrorCode::NOT_FOUND);
        }

        return response()->success($user);
    }

    function update(UserRequest $request)
    {
        /** @var User $user */
        $user = $request->user();
        if ($fullName = $request->input('full_name')) {
            $user->full_name = $fullName;
        }
        if ($email = $request->input('email')) {
            $user->email = $email;
        }
        $user->save();
        return response()->success($user);
    }

    function updatePassword(UserPasswordRequest $request)
    {
        /** @var User $user */
        $user = $request->user();
        $password = $request->input('password');
        if (!Hash::check($password, $user->password)) {
            return response()->error(ErrorCode::INVALID_PASSWORD);
        }
        $user->password = $request->input('new_password');
        $user->save();
        return response()->success(null, SuccessCode::CHANGE_PASSWORD);
    }
}

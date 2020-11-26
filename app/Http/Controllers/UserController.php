<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show(Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->error(__('error.message.user-not-found'), __('error.code.not-found'));
        }

        return response()->success($user);
    }

    function update(UserRequest $request, User $user) {
        if ($fullName = $request->input('full_name')) {
            $user->full_name = $fullName;
        }
        if ($email = $request->input('email')) {
            $user->email = $email;
        }
        $user->save();
        return response()->success($user->fresh());
    }
}

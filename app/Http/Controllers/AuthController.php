<?php

namespace App\Http\Controllers;

use App\Constants\ErrorCode;
use App\Constants\SuccessCode;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(RegisterRequest $request) {
        $user = User::query()->create($request->input());
        return response()->success($this->generateToken($user));
    }

    function login(LoginRequest $request) {
        $email = $request->input('email');
        $user = User::where('email',$email)->first();
        if (!$user) {
            return response()->error(ErrorCode::AUTH_FAILED);
        }
        if (Hash::check($request->password, $user->password)) {
            return response()->success($this->generateToken($user));
        }else{
            return response()->error(ErrorCode::AUTH_FAILED);
        }
    }

    function forgotPassword(ForgotPasswordRequest $request) {
        return  response()->success(null, SuccessCode::FORGOT_PASSWORD);
    }

    private function generateToken(User $user) {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        return [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
        ];
    }
}

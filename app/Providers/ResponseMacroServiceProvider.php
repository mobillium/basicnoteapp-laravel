<?php

namespace App\Providers;

use App\Constants\ErrorCode;
use App\Constants\SuccessCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data,
                                             $code = SuccessCode::DEFAULT,
                                             $status = 200) {
            return Response::json([
                'code' => $code,
                'data' => $data,
                'message' => __('success.'.$code)
            ], $status);
        });

        Response::macro('error', function ($code = ErrorCode::DEFAULT,
                                           $status = 400) {
            return Response::json([
                'code' => $code,
                'message' => $message ?? __('error.'.$code)
            ], $status);
        });
    }
}

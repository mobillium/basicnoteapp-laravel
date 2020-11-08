<?php

namespace App\Providers;

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
        Response::macro('success', function ($value,
                                             $code = null,
                                             $message = null,
                                             $status = 200) {
            return Response::json([
                'code' => $code ?? __('success.code.default'),
                'data' => $value ?? __('success.message.default'),
                'message' => $message
            ], $status);
        });

        Response::macro('error', function ($message = null,
                                           $code = null,
                                           $status = 400) {
            return Response::json([
                'code' => $code ?? __('error.code.default'),
                'message' => $message ?? __('error.message.default')
            ], $status);
        });
    }
}

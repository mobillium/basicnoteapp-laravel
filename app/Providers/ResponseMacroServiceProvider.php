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
        Response::macro('success', function ($data,
                                             $code = null,
                                             $message = null,
                                             $status = 200) {
            return Response::json([
                'code' => $code ?? __('success.code.default'),
                'data' => $data,
                'message' => $message ?? __('success.message.default')
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

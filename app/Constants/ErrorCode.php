<?php

namespace App\Constants;

class ErrorCode
{

    public const DEFAULT = 'common.error';
    public const NOT_FOUND = 'common.not-found';

    public const VALIDATION = 'validation';

    public const UNAUTHORIZED = 'auth.unauthorized';
    public const UNAUTHENTICATED = 'auth.unauthenticated';
    public const AUTH_FAILED = 'auth.failed';

    public const INVALID_PASSWORD = 'user.invalid-password';

}

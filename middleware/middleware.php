<?php

namespace Middleware;

class middleware
{
    const MAP = [
        'auth' => [auth::class, 'handle'],
        'is_user' => [auth::class, 'is_user'],
        'user' => [auth::class, 'user']
    ];
}

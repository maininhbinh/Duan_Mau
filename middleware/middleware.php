<?php

namespace Middleware;

class middleware
{
    const MAP = [
        'auth' => [auth::class, 'handle'],
        'signup' => [auth::class, 'signup'],
        'signin' => [auth::class, 'signin']
    ];
}

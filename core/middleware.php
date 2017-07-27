<?php

use App\Models\User;

$app->options('/{routes:.+}', function($req, $res, $args) {
    return $res;
});

$app->add(function ($req, $resp, $next) {
    $response = $next($req, $resp);

    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});
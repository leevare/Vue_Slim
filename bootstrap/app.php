<?php

session_start();

require VENDOR."autoload.php";

require_once BOOT.'functions.php';

try {
    $dotenv = (new \Dotenv\Dotenv(ROOT))->load();
}catch (\Dotenv\Exception\InvalidPathException $e) {
    //
}

$settings = require_once CORE . "settings.php";

$app = new \Slim\App($settings);

$container = $app->getContainer();

require CORE."dependencies.php";
require CORE."middleware.php";
require CORE."routes.php";
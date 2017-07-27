<?php

$container['PostController'] = function ($c) {
    return new \App\Controllers\PostController($c);
};


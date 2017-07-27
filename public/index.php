<?php

define('VERSION', '1.0.0');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS."..".DS);
define('APP', ROOT."app".DS);
define('BOOT', ROOT."bootstrap".DS);
define('CORE', ROOT."core".DS);
define('VENDOR', ROOT."vendor".DS);

require BOOT."app.php";

$app->run();
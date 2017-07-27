<?php

namespace App\SQL;

use Medoo\Medoo;

class DB extends Medoo {

    public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Medoo([
                'database_type' => getenv('DB_TYPE'),
                'database_name' => getenv('DB_DATANAME'),
                'server' => getenv('DB_SERVERER'),
                'username' => getenv('DB_USERNAME'),
                'password' => getenv('DB_PASSWORD'),
                'charset' => getenv('DB_CHARSERT'),
                'prefix' => getenv('DB_PREFIX')
            ]);
        }
        return self::$instance;
    }
}
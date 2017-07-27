<?php
/**
 * Created by PhpStorm.
 * User: leevare
 * Date: 2017/7/25
 * Time: 10:44
 */

namespace App\Controllers;


class Controller {

    protected $container;

    /**
     * Controllers constructor.
     * @param $container
     */
    public function __construct($container) {
        $this->container = $container;
    }

    public function __get($property) {
        if($this->container->{$property}) {
            return $this->container->{$property};
        }
    }

}
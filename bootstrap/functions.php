<?php
/**
 * Created by PhpStorm.
 * User: leevare
 * Date: 2017/7/25
 * Time: 14:29
 */

function _writeJson($resp, $status, $data, $headerCode=200) {
    if($status === 0) {
        return $resp -> withJson([
            'status' => $status,
            'error' => $data
        ], $headerCode);
    }else {
        return $resp -> withJson([
            'status' => $status,
            'msg' => $data
        ]);
    }
}
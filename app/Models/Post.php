<?php
/**
 * Created by PhpStorm.
 * User: leevare
 * Date: 2017/7/27
 * Time: 9:14
 */

namespace App\Models;

use App\SQL\DB;

class Post {

    private $table = "post";

    protected $db;

    /**
     * Post constructor.
     * @param $db
     */
    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function add($title, $content) {
        $this->db->insert($this->table, [
            'title' => $title,
            'content' => $content,
            'posttime' => time()
        ]);
        return $this->db->id();
    }

    public function delete($id) {
        $data = $this->db->delete($this->table, [
            'id' => $id
        ]);
        return $data->rowCount();
    }

    public function update($id, $title, $content) {
        return $this->db->update($this->table, [
            'title' => $title,
            'content' => $content
        ], [
            'id' => $id
        ]);
    }

    public function view($id) {
        return $this->db->get($this->table, '*', [
            'id' => $id
        ]);
    }

    public function getList($limit = 0, $size = 10) {
        return $this->db->select($this->table, '*', [
            'LIMIT' => [$limit, $size]
        ]);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: leevare
 * Date: 2017/7/27
 * Time: 9:34
 */

namespace App\Controllers;

use App\Models\Post;
class PostController extends Controller {

    public function get($req, $res) {
        $id = $req->getAttribute('id');
        $post = new Post();
        if($id) {
            $view = $post->view($id);
            if($view) return _writeJson($res, 1, $view);
            else return _writeJson($res, 0, '请求地址错误', 400);
        }else {
            $page = $req->getAttribute('page');
            $size = $req->getAttribute('size');
            $page = $page <= 0 ? $page = 1 : $page;
            if($size > 100) {
                return _writeJson($res, 0, '每页最多显示100条数据', 400);
            }
            $view = $post->getList();
            if($view) return _writeJson($res, 1, $view);
            else return _writeJson($res, 0, '暂无内容', 400);
        }
    }

    public function delete($req, $res) {
        $id = $req->getAttribute('id');
        $post = new Post();
        $del_status = $post->delete($id);
        if($del_status) return _writeJson($res, 1, '删除成功');
        else return _writeJson($res, 0, '删除失败', 400);
    }

    public function edit($req, $res) {
        $id = $req->getAttribute('id');
        $title = $req->getParam('title');
        $content = $req->getParam('content');
        $post = new Post();
        $update_status = $post->update($id,$title, $content);
        if($update_status) return _writeJson($res, 1, '修改成功');
        else return _writeJson($res, 0, '修改失败', 400);
    }

    public function add($req, $res) {
        $title = $req->getParam('title');
        $content = $req->getParam('content');
        $post = new Post();
        $add_status = $post->add($title,$content);
        if($add_status >= 0) return _writeJson($res, 1, '添加成功');
        else return _writeJson($res, 0, '添加失败', 400);
    }
}
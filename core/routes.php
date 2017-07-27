<?php

$app->group('/posts', function() {
    $this->get('/', 'PostController:get')->setName('post.list');
    $this->get('/{id}', 'PostController:get')->setName('post.view');
    $this->post('/', 'PostController:add')->setName('post.add');
    $this->put('/{id}', 'PostController:edit')->setName('post.edit');
    $this->delete('/{id}', 'PostController:delete')->setName('post.delete');
});
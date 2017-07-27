import Vue from 'vue'
import Router from 'vue-router'
import Add from 'pages/posts/Add'
import List from 'pages/posts/List'
import View from 'pages/posts/View'
import Edit from 'pages/posts/Edit'
import About from 'pages/About'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [{
        path: '/',
        name: 'List',
        component: List,
        meta: {
            title: '文章列表'
        },
    }, {
        path: '/posts/:id',
        name: 'View',
        component: View,
        meta: {
            title: ''
        }
    }, {
        path: '/add',
        name: 'Add',
        component: Add,
        meta: {
            title: '文章添加'
        }
    }, {
        path: '/edit/:id',
        name: 'Edit',
        component: Edit,
        meta: {
            title: '文章编辑'
        }
    }, {
        path: '/about',
        name: 'About',
        component: About,
        meta: {
            title: '关于'
        }
    }]
})

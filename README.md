# blog

> Slim + Vue.js文章管理系统

## Vue.js Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report
```

For detailed explanation on how things work, checkout the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).

## Slim Installation

create database and import install.sql

Install SlimPHP and dependencies

```bash
composer
```

### API

```bash
$ GET /public/posts
$ GET /public/posts/{id}
$ POST /public/posts/add
$ PUT /public/posts/{id}
$ DELETE /public/posts/{id}
```

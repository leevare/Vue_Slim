<template>
    <div class="container list">
        <h1 class="page-header">文章列表</h1>
        <input type="text" class="form-control" placeholder="请输入文章标题以检索文章" v-model="filterInput">
        <ul class="posts" v-loading="loading" element-loading-text="拼命加载中">
            <li v-for="post in filterBy(posts, filterInput)" class="clearfix">
                <router-link tag="h3" class="title" :to="'/posts/'+post.id">{{post.title}}</router-link>
                <div class="content">{{post.content.substring(0, 120)}}</div>
                <div class="more">
                    <router-link :to="'/posts/'+post.id" class="pull-right">阅读更多</router-link>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'posts',
        data () {
            return {
                loading: false,
                filterInput: '',
                posts: []
            }
        },
        methods: {
            fetchPosts () {
                this.loading = true
                this.$http.get('http://restapi.dev/public/posts/')
                    .then(res => {
                        if (res.status) {
                            this.posts = res.body.msg
                        } else {
                            this.alert = res.body.error
                        }
                        this.loading = false
                    })
            },
            filterBy (list, value) {
                return list.filter(function (post) {
                    return post.title.indexOf(value) > -1
                })
            }
        },
        created () {
            this.fetchPosts()
        }
    }
</script>

<style lang="scss">
    h3 {
        cursor: pointer;
    }

    .posts {
        padding-left: 0;
        position: relative;
        & > li {
            list-style: none;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
        h3 {
            font-size: 18px;
            font-weight: 600;
        }
    }
</style>
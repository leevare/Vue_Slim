<template>
    <div class="container view">
        <router-link to="/">返回</router-link>
        <h1 class="page-header">{{post.title}}</h1>
        <span class="pull-right">
            <router-link class="btn btn-primary" v-bind:to="'/edit/'+post.id">Edit</router-link>
            <button class="btn btn-danger" v-on:click="deletePost(post.id)">Delete</button>
        </span>
        <div class="content">
            {{post.content}}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'postdetail',
        data () {
            return {
                post: ''
            }
        },
        methods: {
            fetchPost(id) {
                this.$http.get('http://restapi.dev/public/posts/' + id)
                    .then(res => {
                        if (res.body.status) {
                            this.post = res.body.msg
                            document.title = this.post.title
                        }else {
                            this.$router.push({
                                path: '/',
                                query: {
                                    alert: res.body.error
                                }
                            })
                        }
                    })
            },
            deletePost(id) {
                this.$confirm('确认删除吗？')
                    .then(_=>{
                        this.$http.delete('http://restapi.dev/public/posts/' + id)
                            .then(res => {
                                if (res.body.status) {
                                    this.$message({
                                        message: '文章删除成功',
                                        type: 'success'
                                    });
                                    this.$router.push({
                                        path: '/'
                                    })
                                } else {
                                    this.$message({
                                        message: res.body.error,
                                        type: 'error'
                                    });
                                }
                            })
                    })
            }
        },
        created () {
            this.fetchPost(this.$route.params.id)
        }
    }
</script>
<template>
    <div class="add container">
        <h1 class="page-header">文章修改</h1>
        <div class="well clearfix">
            <h4>文章信息修改</h4>
            <div class="form-group">
                <label>标题</label>
                <input type="text" class="form-control" placeholder="请输入文章标题"
                       v-model="post.title">
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea class="form-control" cols="30" rows="15" placeholder="请输入内容"
                          v-model="post.content"></textarea>
            </div>
            <el-button @click.prevent="editPost" type="primary" :loading="loading" class="btn-block">修改</el-button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'postedit',
        data () {
            return {
                loading: false,
                post: {}
            }
        },
        methods: {
            fetchPost(id) {
                this.$http.get('http://restapi.dev/public/posts/' + id)
                    .then(res => {
                        if (res.body.status) {
                            this.post = res.body.msg
                        } else {
                            this.$router.push({
                                path: '/',
                                query: {
                                    alert: res.body.error
                                }
                            })
                        }
                    })
            },
            editPost () {
                if (!this.post.title || !this.post.content) {
                    this.$message({
                        showClose: true,
                        message: '请将信息填写完整',
                        type: 'error'
                    })
                } else {
                    let newPost = {
                        title: this.post.title,
                        content: this.post.content
                    }
                    this.$http.put('http://restapi.dev/public/posts/' + this.$route.params.id, newPost)
                        .then(res => {
                            if (res.body.status) {
                                this.$message({
                                    showClose: true,
                                    message: res.body.msg,
                                    type: 'success'
                                })
                                window.setTimeout(_=>{
                                    this.$router.push({
                                        path: '/'
                                    })
                                },800)
                            } else {
                                this.$message({
                                    showClose: true,
                                    message: res.body.error,
                                    type: 'error'
                                })
                            }
                        })
                }
            }
        },
        created () {
            this.fetchPost(this.$route.params.id)
        }
    }
</script>
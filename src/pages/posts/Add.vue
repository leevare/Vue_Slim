<template>
    <div class="add container">
        <h1 class="page-header">文章发布</h1>
        <div class="well clearfix">
            <h4>文章发布</h4>
            <div class="form-group">
                <label>标题</label>
                <input type="text" class="form-control" placeholder="请输入文章标题" v-model="post.title">
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea class="form-control" cols="30" rows="15" placeholder="请输入内容" v-model="post.content"></textarea>
            </div>
            <el-button @click.prevent="addPost" type="primary" :loading="loading" class="btn-block">发布</el-button>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                loading: false,
                post: {}
            }
        },
        methods: {
            addPost () {
                if(!this.post.title || !this.post.content) {
                    this.$message({
                        showClose: true,
                        message: '请将发布信息填写完整',
                        type: 'error'
                    })
                }else {
                    this.loading = true
                    let newPost = {
                        title: this.post.title,
                        content: this.post.content
                    }
                    this.$http.post('http://restapi.dev/public/posts/', newPost)
                        .then(res=>{
                            this.post.loading = false
                            if(res.body.status) {
                                this.$message({
                                    showClose: true,
                                    message: res.body.msg,
                                    type: 'success'
                                })
                                window.setTimeout(()=>{
                                    this.$router.push({
                                        path: '/'
                                    })
                                }, 800)
                            }else {
                                this.$message({
                                    showClose: true,
                                    message: res.body.error,
                                    type: 'error'
                                })
                            }
                        })
                }
            }
        }
    }
</script>
<style scoped="">
    form {
        position: relative;
    }
</style>
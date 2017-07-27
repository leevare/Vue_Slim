<template>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <router-link class="navbar-brand" to="/">Blog</router-link>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><router-link to="/">首页</router-link></li>
                    <li><router-link to="/about">关于</router-link></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><router-link to="/add">发布</router-link></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</template>

<script>
    export default {
        data () {
            return {

            }
        }
    }
</script>

<style lang="scss">
    /*body {
        margin: 0;
        padding: 0;
    }
    a {
        text-decoration: none;
        &:hover {
            text-decoration: none;
        }
    }
    .pull-right {
        float: right !important;
    }
    .header {
        line-height: 40px;
        background-color: #eef1f6;
        .logo {
            height: 40px;
            float: left;
            font-size: 28px;
            color: #444;
            margin-right: 30px;
            &>a{
                display: block;
                color: inherit;
                margin-top: 5px;
            }
        }
        ul {
            list-style: none;
            padding-left: 0;
            margin-top: 0;
            &>li {
                float: left;
                margin-right: 20px;
                position: relative;
                color: #48576a;
                &:last-child {
                    margin-right: 0;
                }
                &>a {
                    display: block;
                    padding: 10px 15px;
                    color: inherit;
                    &.active {
                        color: #20a0ff;
                    }
                }
                &:after {
                    content: '';
                    display: block;
                    position: absolute;
                    width: 100%;
                    background-color: #20A0FF;
                    height: 0;
                    opacity: 0;
                    transition: opacity .3s ease;
                }
                &:hover {
                    &:after {
                        height: 3px;
                        opacity: 1;
                    }
                }
            }
        }
    }*/
</style>
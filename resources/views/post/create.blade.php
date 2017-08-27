@extends('layouts.app')

@section('content')
    <div class="container">
        <!--创建成功显示消息-->
        <div class="alert alert-success" v-if="submitted">
            创建成功!
        </div>

        <!--页面提交之后阻止刷新-->
        <form @submit.prevent="createPost" method="POST">
            <legend>创建文章</legend>

            <!--如果title字段验证失败则添加.has-error-->
            <div class="form-group" :class="{'has-error':errors.title}">
                <label>文章标题</label>
                <input type="text" name="title" class="form-control" v-model="post.title" value="{{ old('title') }}">

                <!--如果验证失败通过FormError组件显示错误信息-->
                <form-error v-if="errors.title" :errors="errors">
                    @{{errors.title.join(',')}}
                </form-error>
            </div>

            <!--如果body字段验证失败则添加.has-error-->
            <div class="form-group" :class="{'has-error':errors.body}">
                <label>文章正文</label>
                <textarea name="body" class="form-control" rows="5" v-model="post.body">{{ old('body') }}</textarea>

                <!--如果验证失败通过FormError组件显示错误信息-->
                <form-error v-if="errors.body" :errors="errors">
                    @{{errors.body.join(',')}}
                </form-error>
            </div>

            <button type="submit" class="btn btn-primary">创建文章</button>
        </form>
    </div>
@endsection

<script>
    var app = new Vue({
        el: '#app',
        data: {
            post: {
                title: '',
                body: ''
            },
            errors: [],
            submitted: false
        },
        methods: {
            createPost: function () {
                var self = this;

                axios.post('/post/save', self.post).then(function(response) {
                    // form submission successful, reset post data and set submitted to true
                    self.post = {
                        title: '',
                        body: '',
                    };

                    // clear previous form errors
                    self.errors = '';

                    self.submitted = true;
                }).catch(function (error) {
                    // form submission failed, pass form  errors to errors array
                    self.errors = error.response.data;
                });
            }
        }
    });
</script>
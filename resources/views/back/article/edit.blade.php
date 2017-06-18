
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="src/img/favicon.ico">
    <title>Blue Cms - 系统后台</title>
    @include('back.public.css')
</head>

<body class="">
<div class="animsition">
    @include('back.public.menu')
    <main id="playground">
    @include('back.public.head')
    <!-- PAGE TITLE -->
        <section id="page-title" class="row">

            <div class="col-md-8">
                <h1>文档管理</h1>
            </div>

            <div class="col-md-4">
                <ol class="breadcrumb pull-right no-margin-bottom">
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Datatables</li>
                </ol>
            </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
            <div class="row">
                <section class="panel panel-danger">
                    <header class="panel-heading">
                        <h4 class="panel-title">修改文档</h4>
                    </header>
                    <div class="panel-body">
                        @include('back.public.form_request')
                        <form action="{{ url('back/article/update/'.$article->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-2" >标题:</label>
                                <input type="text" name="title" value="{{ $article->title }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >分类:</label>
                                {!! $category !!}
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >关键词:</label>
                                <input type="text" name="keys" value="{{ $article->keys }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >TAG标签:</label>
                                {!! $tags !!}
                            </div>
                            <div class="form-group">
                                <label>Flag:</label>
                                    <input type="radio" name="flag_id" value="无" class="checkbox-danger" @if($article->flag_id == '无') checked @endif>无
                                    <input type="radio" name="flag_id" value="推荐" class="checkbox-danger" @if($article->flag_id == '推荐') checked @endif>推荐
                                    <input type="radio" name="flag_id" value="头条" class="checkbox-danger" @if($article->flag_id == '头条') checked @endif>头条
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >点击率:</label>
                                <input type="number" name="clicks" min="0" value="{{ $article->clicks }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >作者:</label>
                                <input type="text" name="user_id" value="{{ $article->user_id }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>缩略图:</label>
                                <input type="file" name="photo" class="form-control">
                                <img src="{{ url('back/photo/public/'.$article->photo) }}" width="150" height="100" style="border: 1px solid #ccc;">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >简述:</label>
                                <textarea name="intro" class="form-control">{{ $article->intro }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >内容:</label>
                                <div id="mdeditor">
                                    {!! editor_css() !!}
                                    <textarea name="content" class="form-control">{{ $article->content }}</textarea>
                                    {!! editor_js() !!}
                                    {!! editor_config('mdeditor') !!}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">提交</button>
                            <button type="reset" class="btn btn-danger">重置</button>
                        </form>
                    </div>
                </section>
            </div>
        </div> <!-- / container-fluid -->
        @include('back.public.footer')
    </main> <!-- /playground -->
    @include('back.public.message')
    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>
</div> <!-- /animsition -->
@include('back.public.js')
</body>
</html>
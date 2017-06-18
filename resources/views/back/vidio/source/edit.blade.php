
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
                <h1>视频管理</h1>
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
                        <h4 class="panel-title">修改视频</h4>
                    </header>
                    <div class="panel-body">
                        @include('back.public.form_request')
                        <form action="{{ url('back/vidio-source/update/'.$vidioSource->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-2" >视频名称:</label>
                                <input type="text" name="name" value="{{ $vidioSource->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >清晰度:</label>
                                <select name="definition" class="form-control">
                                    <option value="{{ $vidioSource->definition }}">当前--{{ $vidioSource->definition }}</option>
                                    <option value="4K">4K</option>
                                    <option value="1080P">1080P</option>
                                    <option value="720P">720P</option>
                                    <option value="480P">480P</option>
                                    <option value="360P">360P</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >大小:</label>
                                <input type="text" name="size" value="{{ $vidioSource->size }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>缩略图:</label>
                                <input type="file" name="photo" class="form-control">
                                <img src="{{ url('back/photo/public/'.$vidioSource->photo) }}" width="150" height="100" style="border: 1px solid #ccc;">
                            </div>
                            <div class="form-group">
                                <label>上传视频:</label>
                                <input type="file" name="src" class="form-control">
                                <a href="{{ url('back/photo/public/'.$vidioSource->src) }}">{{ $vidioSource->src }}</a>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >视频描述:</label>
                                <textarea name="intro" class="form-control">{{ $vidioSource->intro }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >内容:</label>
                                <div id="mdeditor">
                                    {!! editor_css() !!}
                                    <textarea name="content" class="form-control">{{ $vidioSource->content }}</textarea>
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
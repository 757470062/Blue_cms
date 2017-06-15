
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
                <h1>资料管理</h1>
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
                        <h4 class="panel-title">新建资料</h4>
                    </header>
                    <div class="panel-body">
                        <form action="{{ url('back/download/update/'.$download->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h3>资料基本信息</h3>
                            <hr style="height: 1px;background-color:#1a2a42 ">
                            <div class="form-group">
                                <label class="col-md-2" >资料名称:</label>
                                <input type="text" name="name" value="{{ $download->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >分类:</label>
                                {!! $category !!}
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >TAG标签:</label>
                                {!! $tags !!}
                            </div>
                            <div class="form-group">
                                <label>缩略图:</label>
                                <input type="file" name="photo" class="form-control">
                                <img src="{{ url('back/photo/public/'.$download->photo) }}" width="150" height="100" style="border: 1px solid #ccc;">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >文件类型:</label>
                                <input type="text" name="type" value="{{ $download->type }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >文件大小:</label>
                                <input type="text" name="size" value="{{ $download->size }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >文件来源:</label>
                                <input type="text" name="form" value="{{ $download->form }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>显示状态:</label>
                                <input type="radio" name="state" value="1" @if($download->state==1) checked @endif>显示
                                <input type="radio" name="state" value="0" @if($download->state==0) checked @endif>不显示
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >排序:</label>
                                <input type="number" name="sort" value="{{ $download->sort }}" min="1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >简述:</label>
                                <textarea name="content" class="form-control">{{ $download->content }}</textarea>
                            </div>
                            <h3>网盘上传方式：</h3>
                            <hr style="height: 1px;background-color:#1a2a42 ">
                            <div class="form-group">
                                <label class="col-md-2" >网盘名称:</label>
                                <select name="sky_drive_name" class="form-control">
                                    <option value="{{ $download->sky_drive_name }}">当前--{{ $download->sky_drive_name }}</option>
                                    <option value="百度云网盘">百度云网盘</option>
                                    <option value="360云网盘">360云网盘</option>
                                    <option value="天翼云网盘">天翼云网盘</option>
                                    <option value="51咕咕网盘">51咕咕网盘</option>
                                    <option value="115网盘">115网盘</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >网盘地址:</label>
                                <input type="text" name="sky_drive_src" value="{{ $download->sky_drive_src }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >提取密码:</label>
                                <input type="text" name="sky_drive_psw" value="{{ $download->sky_drive_pwd }}" class="form-control">
                            </div>
                            </hr>
                            <h3>本地上传方式：</h3>
                            <hr style="height: 1px;background-color:#1a2a42 ">
                            <div class="form-group">
                                <label>上传资料:当前:</label>
                                <input type="file" name="src" class="form-control">
                                <a href="{{ url('back/photo/public/'.$download->src) }}">{{ $download->src }}</a>
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
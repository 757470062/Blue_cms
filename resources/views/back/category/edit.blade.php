
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
                <h1>分类管理</h1>
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
                        <h4 class="panel-title">新建顶级分类</h4>
                    </header>
                    <div class="panel-body">
                        <form action="{{ url('back/category/update/'.$category->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-2" >分类名称:</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >所属模块:</label>
                                <select name="module_id" class="form-control">
                                    <option value="{{ $category->module_id }}">当前： -- {{ $category->categoryModule->name }} --</option>
                                    @foreach($modules as $k => $v)
                                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >SEO标题:</label>
                                <input type="text" name="seo_title" value="{{ $category->seo_title }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >关键词:</label>
                                <input type="text" name="keys" value="{{ $category->keys }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label  >类型:</label>
                                <input type="radio" name="type" value="list" class="checkbox-danger" @if($category->type == 'list') checked @endif>列表
                                <input type="radio" name="type" value="cover" class="checkbox-danger" @if($category->type == 'cover') checked @endif>封面
                            </div>
                            <div class="form-group">
                                <label class="col-md-2">排序：</label>
                                <input type="number" name="sort" min="0" value="{{ $category->sort }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" >描述:</label>
                                <textarea name="intro" class="form-control">{{ $category->intro }}</textarea>
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
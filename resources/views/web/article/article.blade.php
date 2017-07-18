<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $content->title }}-{{ $category->name }}-Blue个人博客</title>
    <meta name="author" content="ZERGE" />
    <meta name="keywords" content="responsive html template, portfolio, creative, design, clean, minimal, light, dark, twitter, bootstrap" />
    <meta name="description" content="Responsive HTML Template - Blog Page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('web.public.css')
</head>

<body>
@include('web.public.head')
@include('web.article.ban')
<section class="container nav-zone">
    <ol class="col-md-10 col-md-offset-1 breadcrumb">
        <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>
            <a href="#"><strong>{{ $category->name }}</strong></a></li>
        <li class="active">{{ $content->title }}</li>
    </ol>
</section>
<div class="container content">
    <div class="col-md-10 col-md-offset-1 content-box">
    <div class="content-head">
        <h1>{{ $content->title }}</h1>
        <p><strong><i class="fa fa-address-book-o">&nbsp;</i>作者：{{ $content->ArticleBackUser->name }}</strong></p>
        <p><strong><i class="fa fa-calendar-check-o">&nbsp;</i>上传时间：{{ $content->created_at->format('Y-m-d') }}</strong></p>
        <p><i class="fa fa-calendar-check-o">&nbsp;</i><strong>标签：</strong>
            @foreach($content->articleArticleTag as $k => $v)
                <a href="" >{{ $v->articleTagTag->name }}</a> &nbsp;|&nbsp;
            @endforeach
        </p>
    </div>
    <div class="content-body">
            {!! $content->code !!}
    </div>
    </div>
</div>
@include('web.public.footer')
</body>
@include('web.public.js')
</html>
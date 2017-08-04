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
<section class="nav-zone">
    <div class="container-full">
        <div class="col-md-4 col-md-offset-2">
            {{ $category->name }}
        </div>
        <div class="col-md-5 text-right">
            <ol class="breadcrumb">
                <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>
                    <a href="#"><strong>{{ $category->name }}</strong></a></li>
                <li class="active">{{ $content->title }}</li>
            </ol>
        </div>
    </div>
</section>
{{--@include('web.article.ban')--}}
{{--<section class="container-full nav-zone">
    <ol class="col-md-10 col-md-offset-1 breadcrumb">
        <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>
            <a href="#"><strong>{{ $category->name }}</strong></a></li>
        <li class="active">{{ $content->title }}</li>
    </ol>
</section>--}}
<div class="container-full content box-full">
    <div class="col-md-6 col-md-offset-2 content-box">
    <div class="content-head">
        <h1>{{ $content->title }}</h1>
        <p><strong><i class="fa fa-address-book-o">&nbsp;</i>作者：{{ $content->ArticleBackUser->name }}</strong></p>
        <p><strong><i class="fa fa-calendar-check-o">&nbsp;</i>上传时间：{{ $content->created_at->format('Y-m-d') }}</strong></p>
        <p><i class="fa fa-tags">&nbsp;</i><strong>标签：</strong>
            @foreach($content->articleArticleTag as $k => $v)
                <a href="{{ url('/content/tag?search=tag_id:'.$v->tag_id.'&with=articleTagArticle') }}" class="label label-info">{{ $v->articleTagTag->name }}</a>
            @endforeach
        </p>
    </div>
    <div class="content-body">
            {!! $content->code !!}
        <hr>
        <div class="dashang text-center">
            <p><b>欢迎支付宝打赏</b></p>
            <div class="col-md-2 col-md-offset-5"><img src="/dist/images/zfb.png" width="100%"></div>
        </div>
        <hr>
    </div>

    </div>
    @include('web.public.right')
</div>
@include('web.public.footer')
</body>
@include('web.public.js')
</html>
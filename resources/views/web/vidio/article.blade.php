<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>sc.chinaz.com</title>
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
    <ol class="col-md-12 breadcrumb">
        <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>
            <a href="#"><strong>{{ $category->name }}</strong></a></li>
        <li class="active">共{{ $content->name }}条数据</li>
    </ol>
</section>
<div class="container content">
    <div class="well well-sm">
        <h1>{{ $content->name }}</h1>
        <p><strong><i class="fa fa-calendar-check-o">&nbsp;</i>上传时间：</strong>{{ $content->created_at->format('Y-m-d') }}</p>
        <p><i class="fa fa-calendar-check-o">&nbsp;</i><strong>标签：</strong>
            @foreach($content->vidioVidioTag as $k => $v)
                <a href="" >{{ $v->vidioTagTag->name }}</a> &nbsp;|&nbsp;
            @endforeach
        </p>
        <p><i class="fa fa-calendar-check-o">&nbsp;</i><strong>简介：</strong>
            {!! $content->content !!}
        </p>
    </div>
    <div class="content-body">
        <ul class="list-group">
            @foreach($content->vidioVidioSource as $k => $v)
                <li class="list-group-item">
                    <video class="video-js" preload="auto" poster="{{ url('back/photo/public/'.$v->photo) }}" data-setup="{}">
                        <source src="{{ url('back/photo/public/'.$v->src) }}" type="video/mp4">
                    </video>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@include('web.public.footer')
</body>
@include('web.public.js')
</html>
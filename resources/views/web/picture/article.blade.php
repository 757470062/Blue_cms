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

<div class="container">
    <hr>
    <ol class="col-md-12 breadcrumb">
        <li><a href="#">{{ $category->name }}</a></li>
        <li class="active">{{ $content->name }}</li>
    </ol>
    <hr>
</div>
<div class="container ">
<div class="well well-sm picture-content-body">
    <p><strong><i class="fa fa-telegram">&nbsp;</i>名称：</strong>{{ $content->name }}</p>
    <p><strong><i class="fa fa-bookmark">&nbsp;</i>简述：</strong>{{ $content->content }}</p>
    <p>
        <strong><i class="fa fa-tags">&nbsp;</i>标签：</strong>
        @foreach($content->picturePictureTag as $k => $v)
            <a href="">{{ $v->pictureTagTag->name }}</a>
            @endforeach
    </p>
</div>
</div>
<article class="jq22-container container">
    <div class="contents">
        <div class="chroma-gallery mygallery">
            @foreach($content->picturePictureSource as $k => $v)
                <img  src="{{ url('back/photo/public/'.$v->src) }}"
                     alt="{{ $v->name }}" data-largesrc="{{ url('back/photo/public/'.$v->src) }}">
            @endforeach
        </div>
    </div>
</article>


@include('web.public.footer')
</body>
@include('web.public.js')
</html>
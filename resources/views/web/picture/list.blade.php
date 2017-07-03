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
    <div class="picture-search">
    <div class="col-md-4">
        <img src="/dist/img/logo.png">
    </div>
    <div class="col-md-6">
        <form action="" method="post">
        <div class="input-group">

                {{ csrf_field() }}
            <input type="text" class="form-control" placeholder="输入关键字">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">  搜 索  </button>
              </span>
        </div><!-- /input-group -->
        </form>
        <p>热门关键词：
            <a href="">相结合多少度</a>
            <a href="">相结合多少度</a>
            <a href="">相结合多少度</a>
            <a href="">相结合多少度</a>
            <a href="">相结合多少度</a>
        </p>
    </div>
    </div>
    <hr>
    <ol class="col-md-12 breadcrumb">
        <li><a href="#">{{ $category->name }}</a></li>
        <li class="active">共搜索到18条</li>
    </ol>
    <div class="col-md-12" style="overflow: hidden">
        {{--<div class="well" style="overflow: hidden">
            {{ $category->name }}

        </div>--}}
        <div class="grid">
            @foreach($lists as $k => $v)
                <div class="col-xs-6 col-md-3 grid-item">
                        <a href="{{ url('content/'.$category->id.'/'.$v->id) }}">
                            <img src="{{ url('back/photo/public/'.$v->photo) }}" alt="{{ $v->name }}" title="{{ $v->name }}"/>
                        </a>
                </div>
            @endforeach
        </div>
        <div class="col-md-12 page">
        <!-- PAGINATION  -->
        <nav aria-label="pagination pagination-minimal">
            {!! $lists->links() !!}
        </nav>
        </div>
    </div>
</div>
@include('web.public.footer')
</body>
@include('web.public.js')
</html>

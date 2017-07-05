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
        <li class="active">共{{ $lists->toArray()['total'] }}条数据</li>
    </ol>
</section>
<div class="container">
        <div class="grid">
            @foreach($lists as $k => $v)
                <div class="grid-item">
                        <a href="{{ url('content/'.$category->id.'/'.$v->id) }}">
                            <img src="{{ url('back/photo/public/'.$v->photo) }}" alt="{{ $v->name }}" title="{{ $v->name }}"/>
                        </a>
                </div>
            @endforeach
        </div>
        <!-- PAGINATION  -->
        <nav aria-label="pagination pagination-sm">
            {!! $lists->links() !!}
        </nav>
    </div>
@include('web.public.footer')
</body>
@include('web.public.js')
</html>

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
    <div class="col-md-2"></div>
    <div class="col-md-10" style="overflow: hidden">
        <div class="well">{{ $category->name }}</div>
        <div class="grid">
            @foreach($lists as $k => $v)
                <div class="grid-item">
                        <a href="{{ url('content/'.$category->id.'/'.$v->id) }}">
                            <img src="{{ url('back/photo/public/'.$v->photo) }}" alt="{{ $v->name }}" title="{{ $v->name }}"/>
                        </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('web.public.footer')
</body>
@include('web.public.js')
</html>

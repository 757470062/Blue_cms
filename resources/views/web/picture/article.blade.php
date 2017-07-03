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
<div class="container content">
    <div class="col-md-12">
        <div class="panel panel-primary panel-content">
            <div class="panel-heading">
                {{ $content->name }}
            </div>
            <div class="panel-body">
               <div class="col-md-1 info"><i class="fa fa-calendar-check-o"></i> {{ $content->created_at->format('Y-m-d') }}</div>
                <div class="col-md-7 info">
                    TAG:
                    @foreach($content->picturePictureTag as $k => $v)
                        <a href="" >{{ $v->pictureTagTag->name }}</a> &nbsp;|&nbsp;
                    @endforeach
                </div>
            </div>
            <div class="panel-footer content-body">
                {{ $content->content }}
                <ul class="list-group">
                    @foreach($content->picturePictureSource as $k => $v)
                    <li class="list-group-item">
                        {{ $v }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>




@include('web.public.footer')
</body>
@include('web.public.js')
</html>
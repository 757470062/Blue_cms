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
    <div class="col-md-9">
        <div class="panel panel-primary panel-content">
            <div class="panel-heading">
                {{ $content->name }}
            </div>
            <div class="panel-body">
                <div class="col-md-2 info"><i class="fa fa-address-book-o"></i> </div>
                <div class="col-md-3 info"><i class="fa fa-calendar-check-o"></i> {{ $content->created_at->format('Y-m-d') }}</div>
                <div class="col-md-7 info">
                    TAG:
                @foreach($content->downloadDownloadTag as $k => $v)
                    <a href="" >{{ $v->downloadTagTag->name }}</a> &nbsp;|&nbsp;
                @endforeach
                </div>
            </div>
            <div class="panel-footer content-body">

            </div>
        </div>
    </div>
    <div class="col-md-3">
     <div class="panel panel-primary hot-tags">
         <div class="panel-heading">
             热门TAG
         </div>
         <div class="panel-body">
             <a href="" class="label label-default">fsfsfsfsdsds</a>
             <a href="" class="label label-default">fsfsfsf</a>
             <a href="" class="label label-default">fsfsfsfs</a>
             <a href="" class="label label-default">fsfsfsf</a>
             <a href="" class="label label-default">fsfsfsf</a>
             <a href="" class="label label-default">fsfsfsf</a>
             <a href="" class="label label-default">fsfsfsf</a>
         </div>
     </div>
    </div>
</div>
@include('web.public.footer')
</body>
@include('web.public.js')
</html>
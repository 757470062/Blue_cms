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
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{ $category->name }}
            </div>
            <div class="panel-body">

                <ul class="list-group">
                    @foreach($lists as $k => $v)
                    <li class="list-group-item">
                        <div class="col-md-11">
                            <a href="{{ url('content/'.$v->category_id.'/'.$v->id) }}">{{ $v->name }}</a>
                        </div>
                        <div class="col-md-1">
                            <a  href="{{ url('content/'.$v->category_id.'/'.$v->id) }}" class="badge"><i class="fa fa-comments"></i> 14</a>
                        </div>
                        <div class="col-md-12">
                        @foreach($v->downloadDownloadTag as $key => $value)
                            <a href="#" class="label label-info">{{ $value->downloadTagTag->name }}</a>
                        @endforeach
                            <span><i class="fa fa-calendar-check-o"></i> {{ $v->created_at->format('Y-m-d') }}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <!-- PAGINATION  -->
                <nav aria-label="pagination pagination-sm">
                    {!! $lists->links() !!}
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary hot-tags">
            <div class="panel-heading">
                热门标签
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

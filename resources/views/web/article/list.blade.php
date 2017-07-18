<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $category->name }}-Blue个人博客</title>
    <meta name="keywords" content="{{ $category->keys }}" />
    <meta name="description" content="{{ $category->intro }}" />
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
        <li class="active">共{{ $lists->toArray()['total'] }}条数据</li>
    </ol>
</section>
<div class="container">
<div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-body">
                <ul class="list-group content-index">
                    @foreach($lists as $k => $v)
                    <li class="list-group-item">
                        <div class="col-md-3">
                            <img src="{{ url('back/photo/public/'.$v->photo) }}" width="100%">
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-11">
                                <a href="{{ url('content/'.$v->category_id.'/'.$v->id) }}">{{ $v->title }}</a>
                            </div>
                            <div class="col-md-1">
                                <a  href="{{ url('content/'.$v->category_id.'/'.$v->id) }}" class="badge"><i class="fa fa-comments"></i> 14</a>
                            </div>
                            <div class="col-md-12">
                                @foreach($v->articleArticleTag as $key => $value)
                                    <a href="#" class="label label-info">{{ $value->articleTagTag->name }}</a>
                                @endforeach
                                <span><i class="fa fa-calendar-check-o"></i> {{ $v->created_at->format('Y-m-d') }}</span>
                                <span><i class="fa fa-address-book-o"></i> 由{{ $v->articleBackUser->name }}发布</span>
                                <p>{{ str_limit($v->intro, 100, '...') }}</p>
                            </div>
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
    </div>

    @include('web.public.footer')
</body>
@include('web.public.js')
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $key }}-Blue个人博客</title>
    <meta name="keywords" content="{{ $key }}" />
    <meta name="description" content="{{ $key }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
@include('web.public.css')
  </head>

<body>
@include('web.public.head')
<section class="nav-zone">
    <div class="container-full">
        <div class="col-md-4 col-md-offset-2">
           {{ $key }}
        </div>
        <div class="col-md-5 text-right">
            <ol class="breadcrumb">
                <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>
                   <a href="javascript:"><strong>关键词筛选</strong></a></li>
                <li class="active">共{{ $lists->toArray()['total'] }}条数据</li>
            </ol>
        </div>
    </div>
</section>
<div class="container-full box-full">
    @include('web.article.left')
<div class="col-md-6 col-md-offset-2">
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
                                    <a  href="{{ url('content/'.$v->category_id.'/'.$v->id) }}" class="badge"><i class="fa fa-comments"></i> {{ $v->clicks }}</a>
                                </div>
                                <div class="col-md-12">
                                    @foreach($v->articleArticleTag as $key => $value)
                                        <a href="{{ url('/content/tag?search=tag_id:'.$value->tag_id.'&with=articleTagArticle') }}" class="label label-info">{{ $value->articleTagTag->name }}</a>
                                    @endforeach
                                    <span><i class="fa fa-calendar-check-o"></i> {{ $v->created_at->format('Y-m-d') }}</span>
                                    <span><i class="fa fa-address-book-o"></i> 由{{ $v->articleBackUser->name }}发布</span>
                                    <p>{{ str_limit($v->intro, 160, '...') }}</p>
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
    @include('web.public.right')
    </div>

    @include('web.public.footer')
</body>
@include('web.public.js')
</html>

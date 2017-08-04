<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Blue个人博客</title>
    <meta name="keywords" content="laravel,laravel常用扩展包,laravel基础教程,laravel源码,laravel项目" />
    <meta name="description" content="一些关于laravel使用的自己的代码片段和笔记。还推荐一些laravel常用扩展包。" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('web.public.css')
</head>
<body>
@include('web.public.head')
{{--<div class="container-full adaptive">
    <div class="banner" id="adaptive">
        <ul>
            <li><img src="/dist/images/article.png"></li>
            <li><img src="/dist/images/article.png"></li>
            <li><img src="/dist/images/article.png"></li>
        </ul>
    </div>
</div>--}}
<section class="nav-zone">
    <div class="container-full">
        <div class="col-md-4 col-md-offset-2">
          {{--  {{ $category->name }}--}}
        </div>
        <div class="col-md-5 text-right">
            <ol class="breadcrumb">
               {{-- <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>
                    <a href="#"><strong>{{ $category->name }}</strong></a></li>
                <li class="active">共{{ $lists->toArray()['total'] }}条数据</li>--}}
            </ol>
        </div>
    </div>
</section>
<div class="container-full photo-index">
    <div class="col-md-10 col-md-offset-1">
    <div class="tab" id="index-article-btn">
        <ul>
            <li class="col-xs-12"><i class="fa fa-thermometer-full">&nbsp;&nbsp;</i>文章推荐</li>
            <li><a class="btn btn-sm btn-primary " href="javascript:"><i class="fa fa-paper-plane-o">&nbsp;</i>最新发布</a></li>
            <li><a class="btn btn-sm btn-primary" href="javascript:"><i class="fa fa-free-code-camp">&nbsp;</i>点击排行</a></li>
            <li><a class="btn btn-sm btn-primary " href="javascript:"><i class="fa fa-refresh">&nbsp;</i>换一批</a></li>
        </ul>
    </div>
    <div class="photo-body" id="index-article">
        @foreach($articlesNewTake as $k => $v)
        <div class="col-md-3 photo-out">
            <div class="photo-box">
            <div class="photo-head">
                @if($v->photo) <img src="{{ url('back/photo/public/'.$v->photo) }}" > @endif
            </div>
            <div class="photo-body">
                <a href="{{ url('content/'.$v->category_id.'/'.$v->id) }}">{{ $v->title }}</a>
            </div>
                @if(empty($v->photo)) <p>{{ $v->intro }}</p> @endif
            <div class="photo-foot">
               {{-- <button type="button" class="btn btn-default btn-xs" title="赞"><span class="fa fa-thumbs-o-up"></span></button>
                <button type="button" class="btn btn-default btn-xs" title="踩"><span class="fa fa-thumbs-o-down"></span></button>
                <button type="button" class="btn btn-default btn-xs" title="收藏"><span class="fa fa-star-half-empty"></span></button>
                --}}
                <i class="fa fa-calendar-check-o">&nbsp;</i>{{ $v->created_at }}
                <button type="button" class="btn btn-default btn-xs pull-right" title="点击次数"><span class="fa fa-free-code-camp">&nbsp;{{ $v->clicks }}点击</span></button>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</div>
<div class="container-full photo-index">
    <div class="col-md-10 col-md-offset-1">
        <div class="tab" id="index-cate-btn">
            <ul>
                <li class="col-xs-12"><i class="fa fa-telegram">&nbsp;&nbsp;</i>Laravel常用扩展包</li>
                <li><a class="btn btn-sm btn-primary " href="javascript:"><i class="fa fa-paper-plane-o">&nbsp;</i>最新发布</a></li>
                <li><a class="btn btn-sm btn-primary" href="javascript:"><i class="fa fa-free-code-camp">&nbsp;</i>点击排行</a></li>
                <li><a class="btn btn-sm btn-primary " href="javascript:"><i class="fa fa-refresh">&nbsp;</i>换一批</a></li>
            </ul>
        </div>
        <div class="photo-body" id="index-cate">
            @foreach($packages as $k => $v)
                <div class="col-md-3 photo-out">
                    <div class="photo-box">
                        <div class="photo-head">
                            @if($v->photo) <img src="{{ url('back/photo/public/'.$v->photo) }}" > @endif
                        </div>
                        <div class="photo-body">
                            <a href="{{ url('content/'.$v->category_id.'/'.$v->id) }}">{{ $v->title }}</a>
                        </div>
                        @if(empty($v->photo)) <p>{{ $v->intro }}</p> @endif
                        <div class="photo-foot">
                          {{--  <button type="button" class="btn btn-default btn-xs" title="赞"><span class="fa fa-thumbs-o-up"></span></button>
                            <button type="button" class="btn btn-default btn-xs" title="踩"><span class="fa fa-thumbs-o-down"></span></button>
                            <button type="button" class="btn btn-default btn-xs" title="收藏"><span class="fa fa-star-half-empty"></span></button>
                           --}}
                            <i class="fa fa-calendar-check-o">&nbsp;</i>{{ $v->created_at }}
                            <button type="button" class="btn btn-default btn-xs pull-right" title="点击次数"><span class="fa fa-free-code-camp">&nbsp;{{ $v->clicks }}点击</span></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container-full photo-index">
    <div class="col-md-10 col-md-offset-1">
        <div class="photo-body">
            <div class="col-md-5">
                <div class=" index-other">
                    <div class="tab">
                        <ul>
                            <li><i class="fa fa-download">&nbsp;</i>常用下载</li>
                         {{--   <li><a class="btn btn-sm btn-primary " href="{{ url('/') }}"><i class="fa fa-paper-plane-o">&nbsp;</i>最新发布</a></li>
                            <li><a class="btn btn-sm btn-primary" href="{{ url('/?orderBy=clicks&sortedBy=desc') }}"><i class="fa fa-free-code-camp">&nbsp;</i>点击排行</a></li>
                            <li><a class="btn btn-sm btn-primary " href="{{ url('/') }}"><i class="fa fa-refresh">&nbsp;</i>换一批</a></li>
                        --}}
                        </ul>
                    </div>
                    <ul class="downloads">
                        @foreach($downloads as $k => $v)
                            <li class="list-group-item">
                                {{ $v->name }}
                                <a href="{{ url($v->sky_drive_src) }}" class="fa fa-cloud-download" title="{{ $v->name }}下载" target="_blank">&nbsp;</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="index-other">
                    <div class="tab">
                        <ul>
                            <li><i class="fa fa-tags">&nbsp;</i>所有TAG</li>
                         </ul>
                    </div>
                    <ul class="tag-left">
                        @foreach($tags as $k => $v)
                            <li><a href="{{ url('/content/tag?search=tag_id:'.$v->id.'&with=articleTagArticle') }}" class="label label-info">{{ $v->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class=" index-other">
                    <div class="tab">
                        <ul>
                            <li><i class="fa fa-ravelry">&nbsp;</i>友情链接</li>
                        </ul>
                    </div>
                    <ul class="friends">
                        @foreach($friends as $k => $v)
                            <li><a href="{{ url($v->link) }}">{{ $v->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('web.public.footer')
</body>
@include('web.public.js')
</html>

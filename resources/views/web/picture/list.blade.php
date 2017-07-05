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
    <div class="col-md-3 logo">
        <img src="/dist/img/logo.png">
    </div>
    <div class="col-md-5 col-md-offset-1">
        <form action="{{ url('search/'.$category->id) }}" method="post">
            {{ csrf_field() }}
        <div class="input-group">
            <input type="text" name="key"  @if(!empty($key)) value="{{ $key }}" @endif class="form-control" placeholder="输入关键字" >
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">  搜 索  </button>
              </span>
        </div><!-- /input-group -->
        </form>
    </div>
    </div>
    <div class="col-md-12 search-key"><p><strong>热搜关键词：</strong>
            <a href="">实践活动</a>
            <a href="">实践活动</a>
            <a href="">实践活动</a>
            <a href="">实践活动</a>
            <a href="">实践活动</a>
        </p></div>
    <hr>
    <ol class="col-md-12 breadcrumb">
        <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i><a href="#">{{ $category->name }}</a></li>
        <li class="active">共{{ $lists->toArray()['total'] }}条数据</li>
    </ol>
    <hr>
</div>
<div class="container">
            <div class="row active-with-click">
                @foreach($lists as $k => $v)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Pink">
                        <h2>
                            <span><a href="{{ url('content/'.$category->id.'/'.$v->id) }}" >{{ $v->name }}</a></span>
                            <strong>
                                <i class="fa fa-tags">&nbsp;</i>Tag:
                                @foreach($v->picturePictureTag as $key => $value)
                                <a href="" class="lable lable-info">{{ $value->pictureTagTag->name }}</a>
                                @endforeach
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <a href="{{ url('content/'.$category->id.'/'.$v->id) }}" >
                                    <img class="img-responsive" src="{{ url('back/photo/public/'.$v->photo) }}">
                                </a>
                            </div>
                            <div class="mc-description">
                                {{ $v->content }}
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                       {{-- <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>--}}
                    </article>
                </div>
                @endforeach
            </div>
    <div class="col-md-12 page text-center">
        <!-- PAGINATION  -->
        <nav aria-label="pagination pagination-minimal">
            {!! $lists->links() !!}
        </nav>
    </div>

</div>


@include('web.public.footer')




</body>
@include('web.public.js')
</html>

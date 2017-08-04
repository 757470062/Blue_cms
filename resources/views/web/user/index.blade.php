<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Blue个人博客</title>
    <meta name="keywords" content="Blue个人博客" />
    <meta name="description" content="Blue个人博客" />
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
       {{-- <div class="col-md-4 col-md-offset-2">
            --}}{{--  {{ $category->name }}--}}{{--
        </div>--}}
       {{-- <div class="col-md-5 text-left">
            <ol class="breadcrumb">
                 <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>
                     <a href="javascript:"><strong>用户中心</strong></a></li>
                 <li class="active">用户信息</li>
            </ol>
        </div>--}}
    </div>
</section>
<div class="container-full photo-index">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-2 user-left">
            <div class="list-group text-center">
                <a href="{{ url('user') }}" class="list-group-item active">
                    <i class="fa fa-address-card-o">&nbsp;</i>个人信息
                </a>
                <a href="#" class="list-group-item"><i class="fa fa-area-chart">&nbsp;</i> 修改头像</a>
                <a href="{{ url('user/message') }}" class="list-group-item"><i class="fa fa-bell-o">&nbsp;</i> 消息通知</a>
                <a href="#" class="list-group-item"><i class="fa fa-unlock-alt">&nbsp;</i> 修改密码</a>
                {{--<a href="{{ url('logout') }}" class="list-group-item"><i class="fa fa-unlock-alt">&nbsp;</i> 退出登录</a>--}}
            </div>
        </div>
        <div class="col-md-10 user-right">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-cog">&nbsp;</i> 编辑资料
                </div>
                <div class="panel-body">
                   <p>建设中......</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('web.public.footer')
</body>
@include('web.public.js')
</html>

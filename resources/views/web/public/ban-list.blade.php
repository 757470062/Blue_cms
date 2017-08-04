<div class="container ban-sm">
   {{-- <div class="col-md-10 col-md-offset-1">
    <img src="/dist/images/article.png">
    </div>--}}
</div>
<section class="nav-zone">
    <div class="container-full">
    <div class="col-md-4 col-md-offset-2">
        {{ $category->name }}
    </div>
    <div class="col-md-5 text-right">
    <ol class="breadcrumb">
        <li><i class="fa fa-map-marker">&nbsp;&nbsp;</i>
            <a href="#"><strong>{{ $category->name }}</strong></a></li>
        <li class="active">共{{ $lists->toArray()['total'] }}条数据</li>
    </ol>
    </div>
    </div>
</section>
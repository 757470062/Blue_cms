<div class="col-md-3">
    <div class="col-md-12">

    </div>

    <div class="panel panel-primary right-list">
        <div class="panel-heading">
            <i class="fa fa-bandcamp">&nbsp;&nbsp;</i> Laravel常用扩展包
        </div>
        <div class="panel-body">
        <ul>
            @foreach($packages as $k => $v)
            <li><a href="{{ url('content/'.$v->category_id.'/'.$v->id) }}">{{ $v->title }}</a></li>
            @endforeach
        </ul>
        </div>
    </div>
    <div class="panel panel-primary right-list">
        <div class="panel-heading">
            <i class="fa fa-free-code-camp">&nbsp;&nbsp;</i> 热门文章
        </div>
        <div class="panel-body">
            <ul>
                @foreach($hotArticles as $k => $v)
                    <li><a href="{{ url('content/'.$v->category_id.'/'.$v->id) }}">{{ $v->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="panel panel-primary right-list">
        <div class="panel-heading">
            <i class="fa fa-download">&nbsp;&nbsp;</i> 常用下载
        </div>
        <div class="panel-body">
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
	<div class="panel panel-primary right-list">
        <div class="panel-heading">
            <i class="fa fa-tags">&nbsp;&nbsp;</i> TAG
        </div>
        <div class="panel-body">
            <ul class="tag-left">
                @foreach($tags as $k => $v)
                <li><a href="{{ url('/content/tag?search=tag_id:'.$v->id.'&with=articleTagArticle') }}" class="label label-info">{{ $v->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="panel panel-primary right-list">
        <div class="panel-heading">
            <i class="fa fa-ravelry">&nbsp;&nbsp;</i> 友情链接
        </div>
        <div class="panel-body">
            <ul class="friends">
                @foreach($friends as $k => $v)
                    <li><a href="{{ url($v->link) }}">{{ $v->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
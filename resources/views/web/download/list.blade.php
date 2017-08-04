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
@include('web.public.ban-list')
<div class="container-full box-full">
    @include('web.article.left')
    <div class="col-md-6 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-body">
                <ul class="list-group downloads">
                    @foreach($lists as $k => $v)
                        <li class="list-group-item">
                            {{ $v->name }}
                            <a href="{{ url($v->sky_drive_src) }}" class="fa fa-cloud-download" title="{{ $v->name }}下载" target="_blank">&nbsp;</a>
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

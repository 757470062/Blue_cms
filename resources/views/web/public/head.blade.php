<nav class="navbar navbar-inverse navbar-fixed-top top-nav">
    <div class="container-full">
	<div class="col-md-8 col-md-offset-2">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">BLUE 个人博客</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">BLUE</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">首页<span class="sr-only">(current)</span></a></li>
                @for($i = 0; $i < count($menus); $i++)
                    @if(count($menus[$i]['child']) > 0)
                        <li class="dropdown">
                            <a href="{{ url('cate/'.$menus[$i]['id']) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ $menus[$i]['name'] }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @for($j = 0; $j < count($menus[$i]['child']); $j++)
                                    <li><a href="{{ url('cate/'.$menus[$i]['child'][$j]['id']) }}">{{ $menus[$i]['child'][$j]['name'] }}</a></li>
                                @endfor
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ url('cate/'.$menus[$i]['id']) }}">{{ $menus[$i]['name'] }}</a></li>
                    @endif
                @endfor
            </ul>
            <form class="navbar-form navbar-left" action="{{ url('/content/article') }}" method="get" role="search">
                <div class="form-group">
                    <div class="input-group navbar-form-top">
                        <input class="form-control" id="navbarInput-01" name="search" type="search" placeholder="Search">
                        <span class="input-group-btn">
                  <button type="submit" class="btn"><span class="fui-search"></span></button>
                </span>
                    </div>
                </div>
            </form>
			@if (Auth::guest())
            <div class="sigin text-right">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary">登录</a>
            </div>
			@else
				<ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/user') }}">基本资料</a></li>
                <li><a href="{{ url('/user/message') }}">消息通知</a></li>
                  <li><form method="post" action="{{ url('/logout') }}">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-sm btn-inverse">退出登录</button>
                  </form></li>
              </ul>
            </li>
          </ul>
			@endif
        </div><!-- /.navbar-collapse -->
		</div>
    </div><!-- /.container-fluid -->
</nav>

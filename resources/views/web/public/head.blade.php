<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
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
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

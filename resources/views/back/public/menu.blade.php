<!-- start of LOGO CONTAINER -->
<div id="logo-container">
    <a href="dashboard.html" id="logo-img">
        <img src="/back/img/logo.png" class="big-logo" alt="SugarCrush">
        <img src="/back/img/logo-mobile.png" data-no-retina  class="small-logo" alt="SugarCrush">
    </a>
</div>
<!-- end of LOGO CONTAINER -->

<!-- - - - - - - - - - - - - -->
<!-- start of SIDEBAR        -->
<!-- - - - - - - - - - - - - -->
<div id="sidebar">
    <div class="sidebar_scroll"> <!-- start of slimScroll -->

        <!--
        <div class="welcome">
          <div class="left">
            <div class="img-container">
              <img src="datafiles//demoimage.gif" class="welcome-img">
            </div>
          </div>

          <div class="right">
            <span>Welcome, <strong>Bruno</strong></span>
            <ul class="user-options">
              <li><a href="#"><i class="ti-user"></i></a></li>
              <li><a href="#"><i class="ti-pencil"></i></a></li>
              <li><a href="#"><i class="ti-settings"></i></a></li>
              <li><a href="#"><i class="ti-power-off"></i></a></li>
            </ul>
          </div>
        </div>
        -->

        <ul class="nav lg-menu" id="main-nav">
            <li class="sidebar-title">
                <h5 class="text-center margin-bottom-30 margin-top-15">Navigation</h5>
            </li>
            <li><a href="dashboard.html" > <i class="ti-dashboard"></i> <span>Dashboard</span></a>
            </li>

            <li><a href="#"> <i class="ti-email"></i> <span>Messages</span> <i class="pull-right has-submenu ti-angle-right"></i> <span class="label label-info label-as-badge">12</span></a>
                <ul class="nav nav-submenu submenu-hidden">
                    <li><a href="inbox.html" >Inbox</a></li>
                    <li><a href="compose.html" >Compose</a></li>
                    <li><a href="mail-single.html" >Read message</a></li>
                </ul>
            </li>

            <li><a href="#"> <i class="ti-user"></i> <span>Users</span> <i class="pull-right has-submenu ti-angle-right"></i></a>
                <ul class="nav nav-submenu submenu-hidden">
                    <li><a href="users.html" >All Users</a></li>
                    <li><a href="newuser.html" >Add new</a></li>
                </ul>
            </li>

            <li><a href="#"> <i class="ti-package"></i> <span>Extra pages</span> <i class="pull-right has-submenu ti-angle-right"></i> <span class="label label-danger">hot!</span></a>
                <ul class="nav nav-submenu submenu-hidden">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="recover.html">Recover password</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="lockscreen.html">Locked screen</a></li>
                    <li><a href="chat.html">Conversation</a></li>
                    <li><a href="blank.html">Blank page</a></li>
                </ul>
            </li>

            <li class="sidebar-title">
                <h5 class="text-center margin-bottom-30 margin-top-15">Demos &amp; Docs</h5>
            </li>


            <li><a href="widgets.html" > <i class="ti-plug"></i> <span>Widgets</span> <span class="label label-warning">40+</span></a></li>

            <li><a href="#"> <i class="ti-smallcap"></i> <span>分类管理</span> <i class="pull-right has-submenu ti-angle-right"></i></a>
                <ul class="nav nav-submenu submenu-hidden">
                    <li><a href="{{ url('back/category') }}" >所有分类</a></li>
                    <li><a href="{{ url('back/category/create') }}" >新建顶级分类</a></li>
                </ul>
            </li>
            <li><a href="#"> <i class="ti-layout-grid3-alt"></i> <span>文档管理</span> <i class="pull-right has-submenu ti-angle-right"></i></a>
                <ul class="nav nav-submenu submenu-hidden">
                    <li><a href="{{ url('back/article') }}" >所有文档</a></li>
                    <li><a href="{{ url('back/article/create') }}" {{--class="active_submenu"--}}>新建文档</a></li>
                </ul>
            </li>
            <li><a href="#"> <i class="ti-layout-cta-left"></i> <span>模块管理</span> <i class="pull-right has-submenu ti-angle-right"></i></a>
                <ul class="nav nav-submenu submenu-hidden">
                    <li><a href="{{ url('back/module') }}" >所有模块</a></li>
                    <li><a href="{{ url('back/module/create') }}" >新建模块</a></li>
                </ul>
            </li>
            <li><a href="charts.html"> <i class="ti-bar-chart"></i> <span>Charts</span></a></li>
            <li><a href="styles.html"> <i class="ti-palette"></i> <span>Styles configuration</span></a></li>

            <li class="sidebar-title">
                <h5 class="text-center margin-bottom-30 margin-top-15">Widgets</h5>
            </li>
            <li class="widget">
                <div class="form-group">
                    <div class="small"><span class="initialism">Bandwidth</span> <span class="pull-right label label-primary">90%</span></div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="small">CPU usage <span class="pull-right label label-warning">51%</span></div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="51" aria-valuemin="0" aria-valuemax="100" style="width: 51%;"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="small">Database <span class="pull-right label label-danger">6%</span></div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                    </div>
                </div>
            </li>

        </ul>

    </div> <!-- end of slimScroll -->
</div>
<!-- - - - - - - - - - - - - -->
<!-- end of SIDEBAR          -->
<!-- - - - - - - - - - - - - -->
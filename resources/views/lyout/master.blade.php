<html>
    <head>
        <meta charset="UTF-8">
        <title>后台管理</title>
        <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/main.css"/>
        <script type="text/javascript" src="{{asset('admin')}}/js/libs/modernizr.min.js"></script>
    </head>
<body>
    <div class="topbar-wrap white">
        <div class="topbar-inner clearfix">
            <div class="topbar-logo-wrap clearfix">
                <ul class="navbar-list clearfix">
                    <li><a class="on" href="/index">首页</a></li>
                </ul>
            </div>
            <div class="top-info-wrap">
                <ul class="top-info-list clearfix">
                    <li><a href="http://www.jscss.me">管理员</a></li>
                    <li><a href="http://www.jscss.me">修改密码</a></li>
                    <li><a href="/exit">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container clearfix">
        <div class="sidebar-wrap">
            <div class="sidebar-title">
                <h1>菜单</h1>
            </div>
            <div class="sidebar-content">
                <ul class="sidebar-list">
                    <li>
                        <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                        <ul class="sub-menu">
                            <li><a href="/privieges"><i class="icon-font">&#xe008;</i>导航管理</a></li>
                            <li><a href="/nav"><i class="icon-font">&#xe005;</i>轮播图管理</a></li>
                            <li><a href="/design"><i class="icon-font">&#xe006;</i>直播分类管理</a></li>
                            <li><a href="/vedio"><i class="icon-font">&#xe006;</i>视频管理</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                        <ul class="sub-menu">
                            <li><a href="/system"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                            <li><a href="/helpindex"><i class="icon-font">&#xe037;</i>帮助中心</a></li>
                            <li><a href="/contact"><i class="icon-font">&#xe046;</i>联系我们</a></li>
                            {{--<li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>--}}
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-font">&#xe018;</i>权限管理</a>
                        <ul class="sub-menu">
                            <li><a href="/adminindex"><i class="icon-font">&#xe017;</i>用户管理</a></li>
                            <li><a href="/roleindex"><i class="icon-font">&#xe037;</i>角色管理</a></li>
                            <li><a href="/privilegeindex"><i class="icon-font">&#xe046;</i>权限管理</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>

<div class="container">
    @yield('content')
</div>
    </div>
</body>
</html>

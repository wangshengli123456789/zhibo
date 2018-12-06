<html>
    <head>
        <meta charset="UTF-8">
        <title>『有主机上线』后台管理</title>
        <link rel="stylesheet" type="text/css" href="{{asset('login')}}/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('login')}}/css/main.css"/>
        <script type="text/javascript" src="{{asset('login')}}/js/libs/modernizr.min.js"></script>
    </head>
<body>
    <div class="topbar-wrap white">
        <div class="topbar-inner clearfix">
            <div class="topbar-logo-wrap clearfix">
                <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
                <ul class="navbar-list clearfix">
                    <li><a class="on" href="index.html">首页</a></li>
                </ul>
            </div>
            <div class="top-info-wrap">
                <ul class="top-info-list clearfix">
                    <li><a href="http://www.jscss.me">管理员</a></li>
                    <li><a href="http://www.jscss.me">修改密码</a></li>
                    <li><a href="http://www.jscss.me">退出</a></li>
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
                            <li><a href="design.html"><i class="icon-font">&#xe008;</i>作品管理</a></li>
                            <li><a href="design.html"><i class="icon-font">&#xe005;</i>博文管理</a></li>
                            <li><a href="design.html"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                            <li><a href="design.html"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                            <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                            <li><a href="design.html"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                            <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                        <ul class="sub-menu">
                            <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                            <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                            <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                            <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
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

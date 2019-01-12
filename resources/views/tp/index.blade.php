<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>最萌班级合照秀</title>
    <link rel="stylesheet" href="{{asset('tp')}}/css/celebrity.css">
</head>
<body>
    <div id="wrap_content">
        <div class="intro-wrap">
            <div class="inner">
                <img src="{{asset('tp')}}/images/t01c5ce9b524c875442.png" style="left:5px;position:absolute;top:5px;height:60px">
            </div>
        </div>
        {{--<div class="latest-wrap">--}}
            {{--<div class="inner">--}}
                {{--<ul class="headlist">--}}
                    {{--<li>--}}
                        {{--<a href="vote.html" class="js-vote">--}}
                            {{--<div class="head-wrap">--}}
                                {{--<div class="head" style="background-image:url(images/644.jpg)"></div>--}}
                            {{--</div>--}}
                            {{--<p class="title">小一班</p>--}}
                            {{--<p class="count"><em>426</em> 票</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="vote.html" class="js-vote">--}}
                            {{--<div class="head-wrap">--}}
                                {{--<div class="head" style="background-image:url(images/640.jpg)"></div>--}}
                            {{--</div>--}}
                            {{--<p class="title">大二班</p>--}}
                            {{--<p class="count"><em>426</em> 票</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="vote.html" class="js-vote">--}}
                            {{--<div class="head-wrap">--}}
                                {{--<div class="head" style="background-image:url(images/641.jpg)"></div>--}}
                            {{--</div>--}}
                            {{--<p class="title">中二班</p>--}}
                            {{--<p class="count"><em>426</em> 票</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="vote.html" class="js-vote">--}}
                            {{--<div class="head-wrap">--}}
                                {{--<div class="head" style="background-image:url(images/642.jpg)"></div>--}}
                            {{--</div>--}}
                            {{--<p class="title">小三班</p>--}}
                            {{--<p class="count"><em>426</em> 票</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="hottest-wrap">
            <div class="inner">
                <div class="main-title s"></div>
                <ul id="hottest_headlist" class="headlist">
                    <li class="first">
                        <a href="vote.html" class="js-vote">
                            <div class="clearfix">
                                <div class="head-wrap">
                                    <div class="head" style="background-image:url({{$max->photo}})"></div>
                                </div>
                                <div class="interactive">
                                    <p class="title" style="font-size:20px;padding:25px 0 25px">{{$max->name}}</p>
                                    <p class="count"><em>{{$max->count}}</em> 票</p>
                                </div>
                            </div>
                            <div class="s decorative"></div> 
                        </a>
                    </li>
                    @foreach($list as $v)
                    <li class="normal">
                        <a href="#" class="js-vote">
                            <div class="clearfix">
                                <div class="head-wrap">
                                    <div class="head" style="background-image:url({{$v->photo}})"></div>
                                </div>
                                <div class="interactive">
                                    <p class="title">{{$v->name}}</p>
                                    <p class="count"><em>{{$v->count}}</em> 票</p>
                                </div>
                            </div>
                            <div class="s decorative"></div>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div id="loading_stat" class="loading-wrap">
                    <div class="loading">加载中</div>
                </div>
            </div>
        </div>
        <div class="bar bar-fixed">
            <div class="inner">
                <ul class="foot-nav">
                    <li><a href="/tprule" class="js-join">活动规则</a> </li>
                    <li><a href="/tpindex" class="highlight js-gift">排名</a> </li>
                    <li><a href="/tpprize" class="js-search">查看奖品</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="{{asset('tp')}}/js/zepto.js"></script>
    <script src="{{asset('tp')}}/js/jweixin-1.js"></script>
    <script src="{{asset('tp')}}/js/celebrity.js"></script>
</body>

</html>

@extends('lyout.master')
@section('content')
<div class="main-wrap">
    <div class="result-wrap">
        <div class="result-title">
            <h1>快捷操作</h1>
        </div>
        <div class="result-content">
            <div class="short-wrap">
                <a href="#"><i class="icon-font">&#xe001;</i>新增直播</a>
                <a href="/navadd"><i class="icon-font">&#xe005;</i>新增轮播图</a>
                <a href="/zb_insert_type"><i class="icon-font">&#xe048;</i>新增直播分类</a>
                {{--<a href="#"><i class="icon-font">&#xe041;</i>新增博客分类</a>--}}
                {{--<a href="#"><i class="icon-font">&#xe01e;</i>作品评论</a>--}}
            </div>
        </div>
    </div>
    <div class="result-wrap">
        <div class="result-title">
            <h1>系统基本信息</h1>
        </div>
        <div class="result-content">
            <ul class="sys-info-list">
                <li>
                    <label class="res-lab">操作系统</label><span class="res-info">{{$data['server']}}</span>
                </li>
                <li>
                    <label class="res-lab">运行环境</label><span class="res-info">{{$data['apache']}}</span>
                </li>
                <li>
                    <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                </li>
                <li>
                    <label class="res-lab">北京时间</label><span class="res-info">{{$data['create_time']}}</span>
                </li>
                <li>
                    <label class="res-lab">服务器域名/IP</label><span class="res-info">{{$data['addrname']}}</span>
                </li>
                <li>
                    <label class="res-lab">Host</label><span class="res-info">{{$data['host']}}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="result-wrap">
        <div class="result-title">
            <h1>使用帮助</h1>
        </div>
        <div class="result-content">
            <ul class="sys-info-list">
                <li>
                    <label class="res-lab">官方交流网站：</label><span class="res-info"><a href="{{$data['name']}}" target="_blank">{{$data['name']}}</a></span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
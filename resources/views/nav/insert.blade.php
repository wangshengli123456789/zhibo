@extends('lyout.master')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/nav">轮播图管理</a><span class="crumb-step">&gt;</span><span>新增轮播图</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        {{csrf_field()}}
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>轮播图名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="nav_name" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>轮播图链接地址：</th>
                                <td>
                                    <input class="common-text required" id="title" name="nav_url" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>轮播图片：</th>
                                <td>
                                    <input id="title" name="picture" type="file">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>排序：</th>
                                <td><input class="common-text" name="sort" size="50" value="" type="text"></td>
                            </tr>
                        <input type="hidden" value="{{time()}}" name="create_time">
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="添加" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection
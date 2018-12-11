@extends('lyout.master')
@section('content')

    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/nav">联系我们</a><span class="crumb-step">&gt;</span><span>修改</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        {{csrf_field()}}
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>详细说明：</th>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <script type="text/javascript" charset="utf-8" src="{{asset('phpditor')}}/ueditor.config.js"></script>
                                        <script type="text/javascript" charset="utf-8" src="{{asset('phpditor')}}/ueditor.all.min.js"> </script>
                                        <script type="text/javascript" charset="utf-8" src="{{asset('phpditor')}}/lang/zh-cn/zh-cn.js"></script>
                                        <textarea name="content" id="editor" type="text/plain" style="width: 900px;height:500px;">{{$data->content}}</textarea></div>
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('editor');</script></td>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>公众号名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="gzh" size="50" value="{{$data->gzh}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>二维码图片：</th>
                                <td>
                                    <input id="title" name="code" type="file">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>提示信息：</th>
                                <td><textarea name="prompt" cols="50" rows="10">{{$data->prompt}}</textarea></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>排序：</th>
                                <td><input class="common-text" name="sort" size="50" value="{{$data->sort}}" type="text"></td>
                            </tr>
                        <input type="hidden" value="{{time()}}" name="create_time">
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="修改" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection
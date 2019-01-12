@extends('lyout.master')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/nav">规则管理</a><span class="crumb-step">&gt;</span><span>新增规则</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        {{csrf_field()}}
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>活动介绍：</th>
                                <td>
                                    <div>
                                        <script type="text/javascript" charset="utf-8" src="{{asset('phpditor')}}/ueditor.config.js"></script>
                                        <script type="text/javascript" charset="utf-8" src="{{asset('phpditor')}}/ueditor.all.min.js"> </script>
                                        <script type="text/javascript" charset="utf-8" src="{{asset('phpditor')}}/lang/zh-cn/zh-cn.js"></script>
                                        <textarea name="hdjs" id="editor" type="text/plain" style="width: 700px;height:300px;"></textarea></div>
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('editor');</script></td>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>温馨提示：</th>
                                <td>
                                    <input class="common-text required" id="title" name="message" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>奖项设置：</th>
                                <td>
                                    <textarea name="jxsz" id="" cols="60" rows="10"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>关于作弊：</th>
                                <td>
                                    <textarea name="gyzb" id="" cols="60" rows="10"></textarea>
                                </td>
                            </tr>
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
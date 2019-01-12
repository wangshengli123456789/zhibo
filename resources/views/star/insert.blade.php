@extends('lyout.master')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/nav">投票管理</a><span class="crumb-step">&gt;</span><span>新增选手</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        {{csrf_field()}}
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>选项标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="name" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>联系电话：</th>
                                <td>
                                    <input class="common-text required" id="title" name="telphone" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>参赛宣言：</th>
                                <td>
                                    <input class="common-text required" id="title" name="content" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <th><i class="require-red">*</i>性别：</th>
                                <td>
                                    <input class="common-text required"  name="sex" size="50" value="男" type="radio" checked> 男
                                    <input class="common-text required"  name="sex" size="50" value="女" type="radio"> 女
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>个人简介：</th>
                                <td>
                                    <textarea name="jianjie" id="" cols="30" rows="10"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>上传图片：</th>
                                <td>
                                    <input id="title" name="photo" type="file">
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
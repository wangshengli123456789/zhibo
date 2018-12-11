@extends('lyout.master')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        {{csrf_field()}}
                        <tbody>
                        <tr>
                            <th width="120"><i class="require-red">*</i>上级分类：</th>
                            <td>
                                <select name="pid" id="catid" class="required">
                                    <option value="0">顶级分类</option>
                                    @foreach($list as $k=>$v)
                                        <option value="{{$v->id}}" @if($info->pid==$v->id)selected="selected" @endif>{{str_repeat('--|',$v->level)}}{{$v->pri_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>分类名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="pri_name" size="50" value="{{$info->pri_name}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>排序：</th>
                                <td><input class="common-text" name="sort" size="50" value="{{$info->sort}}" type="text"></td>
                            </tr>
                        <input type="hidden" value="{{time()}}" name="create_time">
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection
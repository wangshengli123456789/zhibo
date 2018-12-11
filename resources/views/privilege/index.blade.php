@extends('lyout.master')
@section('content')
    <div class="main-wrap">
        <style>
            .pagination li {
                text-align: center;
                margin-top: 28px;
                padding:10px 20px;
                border: 2px solid #6dd4ff;
                border-radius: 10%;
                font-size: 16px;
                float: left;
            }
            .pagination li:hover{
                background: #70e5ff;
            }
            .pagination li span{

            }
        </style>
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">权限管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/privilegesearch" method="post">
                    <table class="search-tab">
                        {{csrf_field()}}
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="p_name" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="/privilegedeletes">
                <div class="result-title">
                    <div class="result-list">
                        {{csrf_field()}}
                        <a href="/privilegeinsertadd"><i class="icon-font"></i>新增权限分类</a>
                        <a id="batchDel" href="javascript:void(0)" onclick="$('#myform').submit()"><i class="icon-font" ></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>权限名称</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($list as $k=>$v)
                            <tr>
                                <td class="tc"><input class="ids" value="{{$v->p_id}}" name="p_id[]" type="checkbox"></td>
                                <td>{{$v->p_id}}</td>
                                <td>{{$v->p_name}}</td>
                                <td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
                                <td>
                                    <a class="link-update" href="/privilegeupdateadd/{{$v->p_id}}">修改</a>
                                    <a class="link-del" href="/privilegedelete/{{$v->p_id}}">删除</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </form>
            {{$list->render()}}
        </div>
    </div>
    <script src="http://www.jq22.com/jquery/jquery-3.3.1.js"></script>
    <script>
        // //全选的方法
        $('.allChoose').click(function(){
            var oC = $(this).prop('checked');
            $('.ids').prop('checked',oC);
        });
    </script>
    <!--/main-->
@endsection
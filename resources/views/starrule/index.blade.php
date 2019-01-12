@extends('lyout.master')
@section('content')
    {{--<link rel="stylesheet" href="{{asset('css')}}/app.css">--}}
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">选手管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/navsearch" method="post">
                    <table class="search-tab">
                        <tr>
                            {{csrf_field()}}
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="navdelall">
                <div class="result-title">
                    <div class="result-list">
                        {{csrf_field()}}
                        <a href="/starruleadd"><i class="icon-font"></i>新增选手</a>
                        <a id="batchDel" href="javascript:void(0)" onclick="if (confirm('确定删除吗?')) {$('#myform').submit()}"><i class="icon-font" ></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>序号</th>
                            <th>温馨提示</th>
                            <th>奖项设置</th>
                            <th>关于作弊</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($list as $k=>$v)
                            <tr>
                                <td class="tc"><input class="ids" value="{{$v->id}}" name="id[]" type="checkbox"></td>
                                <td>
                                    {{$k+1}}
                                </td>
                                <td>
                                    {{$v->message}}
                                </td>
                                <td>{{$v->jxsz}}</td>
                                <td>{{$v->gyzb}}</td>
                                <td>{{$v->created_at}}</td>

                                <td>
                                    <a class="link-update" href="/starruleupdate/{{$v->id}}">修改</a>
                                    <a class="link-del" href="/starruledelete/{{$v->id}}">删除</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </form>
        </div>
    </div>

    <script src="http://www.jq22.com/jquery/jquery-3.3.1.js"></script>
    <script>
        // //全选的方法
        $('.allChoose').click(function(){
            var oC = $(this).prop('checked');
            $('.ids').prop('checked',oC);
        });
        //更改状态
        function status(id,status) {
            $.ajax({
                type:'get',
                url:'/updatestatus',
                data:{status:status,id:id},
                success:function (e) {
                    window.location.reload();
                }
            })
        }
    </script>
    <!--/main-->
@endsection
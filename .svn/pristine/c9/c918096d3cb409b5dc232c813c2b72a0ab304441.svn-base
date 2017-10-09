@extends('Admin.layouts.layout_admin')
@section('css')
<link rel="stylesheet" type="text/css" href="/public/common/treeTable/jquery.treetable.theme.default.css">
<link rel="stylesheet" type="text/css" href="/public/common/treeTable/jquery.treetable.css">
<link rel="stylesheet" type="text/css" href="/public/common/zTree/css/zTreeStyle/zTreeStyle.css">
@endsection  {{--css--}}
@section('nav')
@endsection  {{--nav--}}
@section('header')
@endsection  {{--nav--}}
@section('main')
<main class="main-cont content mCustomScrollbar">
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route("index.index")}}">首页</a><i class="icon-angle-right"></i></li>
            <li><a href="#">角色管理</a><i class="icon-angle-right"></i></li>
        </ul>
    </div>
    <div style="margin:5px 0px">
        <button class="btn btn-secondary-outline"><a href="{{route("AdminRole.create")}}">添加</a></button>
    </div>
    <!--开始::内容-->
    <fieldset class="layui-elem-field layui-field-title">
        <legend>角色节点</legend>
        <div class="layui-field-box">
            <form class="layui-form" action="{{route('AdminRole/weight',['role_id'=>$role_id])}}" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-inline">
                        <ul id="nodetree" class="ztree"></ul>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$nodeIds}}" name="node_id" id="node_id">
                        <button class="layui-btn layui-btn-small" lay-submit>提交</button>
                    </div>
                </div>

            </form>
        </div>
    </fieldset>
</main>
@endsection  {{--nav--}}
@section('footer')
@endsection  {{--nav--}}
@section('js')
    <script type="text/javascript" src="/public/common/zTree/js/jquery.ztree.core.min.js"></script>
    <script type="text/javascript" src="/public/common/zTree/js/jquery.ztree.excheck.min.js"></script>
    <script type="text/javascript">
        var setting = {
            check: {
                enable: true,
                chkboxType: { "Y" : "ps", "N" : "s" }
            },
            data: {
                simpleData: {
                    enable: true,
                    idKey: "node_id",
                    pIdKey: "pid",
                }
            },
            callback: {
                onCheck:onCheck
            }
        };

        var node = {!! $result !!};
        /**
         * 获取选中的节点，更新数据到隐藏域
         */
        function onCheck(e,treeId,treeNode) {
            var treeObj = $.fn.zTree.getZTreeObj("nodetree");
            var nodes = treeObj.getCheckedNodes(true);
            var nodeIds = "";
            for(var i=0;i<nodes.length;i++){
                if(nodeIds == '') {
                    nodeIds += nodes[i].node_id;
                }else{
                    nodeIds += "," + nodes[i].node_id;
                }

            }
            $("#node_id").attr('value',nodeIds);
        }

        $(document).ready(function(){
            $.fn.zTree.init($("#nodetree"), setting, node);
        });
    </script>
@endsection  {{--nav--}}
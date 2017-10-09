@extends('Admin.layouts.layout_admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="/public/common/treeTable/jquery.treetable.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/public/common/treeTable/jquery.treetable.css">
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
        @if (Session::has('msg'))
            <div class="alert alert-success">
                {{Session::get('msg')}}
            </div>
        @endif
        <!--开始::内容-->
        <table class="table table-bordered table-striped table-hover treetable" id="nodetree">
            <thead>
            <tr>
                {{--<th>ID</th>--}}
                <th>角色</th>
                <th>时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            @if(isset($result))
                <?php
                $tmp = '';
                \App\ClassLib\Category::treeMap($result,function($v) use(&$tmp) {
                    $tmp .= '<tr class="cen" data-tt-id="'.$v['role_id'].'" data-tt-parent-id="'.$v['pid'].'">';
                    $checkbox = '';
                    $tmp .= '<td id="sp-'.$v['role_id'].'"><span class="'.(!empty($v['child']) ? 'folder' : 'file').'">'.$v['rolename'].'</span>'.$checkbox.'</td>';
                    $tmp .= '<td>'.$v['created_at'].'</td>';
                    $tmp .= '<td>';
                    $tmp .= '<a class="mr-5" title="添加" href="'.route("AdminRole.create",['id'=>$v['role_id']]).'">添加</a>';
                    $tmp .= '<a class="mr-5" title="权值" href="'.route("AdminRole/weight",['id'=>$v['role_id']]).'">权值</a>';
                    if(empty($v['child'])) $tmp .= '<a class="mr-5" href="'.route("AdminRole.delete",['id'=>$v['role_id']]).'" onclick="DELETEall(this);return false;">删除</a>';
                    $tmp .= '</td>';
                    $tmp .= '</tr>';
                });
                echo $tmp;
                ?>
            @endif
            </tbody>
        </table>
    </main>
@endsection  {{--nav--}}
@section('footer')
@endsection  {{--nav--}}
@section('js')
    <script type="text/javascript" src="/public/common/treeTable/jquery.treetable.js"></script>
    <script>
        function DELETEall(node) {
            var url = node.href;
            var to = "{{csrf_token()}}";
            $.ajax({
                url:url,
                data: {'_token':to},
                type:'DELETE',
                success:function (result) {
                    //判断result结果
                    if (result.error){
                        $("#dialog").fadeIn();
                        $("#dialog h4").html(result.msg);
                        setTimeout(function () {
                            $("#dialog").fadeOut();
                        },1000);
                        window.location.reload();
                    }else{
                        $("#dialog").fadeOut();
                        $("#dialog h4").html(result.msg);
                        setTimeout(function () {
                            $("#dialog").fadeIn();
                        },2000);
                    }
                }
            })
        };
        $(function(){
            /**
             * 初始化树形表格
             */
            $("#roletree").treetable({expandable: true});
        });
        $(function(){
            /**
             * 初始化树形表格 并展开节点到二级
             */
            $("#nodetree").treetable({expandable: true}).find('tr').each(function (i) {
                var o = $(this)
                if(o.attr('data-tt-parent-id') == 0 && o.siblings("[data-tt-parent-id='"+o.attr('data-tt-id')+"']").hasClass('leaf') == false) {
                    $("#nodetree").treetable("expandNode", o.attr('data-tt-id'));
                }
            });
        });
    </script>
@endsection  {{--nav--}}
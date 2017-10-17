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
            {{--<div class="breadcrumb">--}}
                {{--<ul>--}}
                    {{--<li><a href="{{route("index.index")}}">首页</a><i class="icon-angle-right"></i></li>--}}
                    {{--<li><a href="#">用户管理</a><i class="icon-angle-right"></i></li>--}}
                {{--</ul>--}}
            {{--</div>--}}

            <div style="margin:15px 0px">
                @if(Session::get('user')['user_id'] == 1)
                <button class="btn btn-secondary-outline"><a href="{{route("Administrators.create")}}">添加</a></button>
                @endif
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
                    <th>id</th>
                    <th>姓名</th>
                    <th>状态</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($content))
                    @foreach($content as $k=>$v)
                        <tr class="cen">
                            <td>{{$v->user_id}}</td>
                            <td><a href="#">{{$v->username}}</a></td>
                            <td>{{$v->ban == \App\Model\AdminUser::BAN_NO ? '正常' : '禁止'}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>
                                <a title="添加" class="mr-5" href="{{route("Administrators.create",['id'=>$v['user_id']])}}">添加</a>
                                <a title="权值" class="mr-5" href="{{route("Administrators.edit",['id'=>$v['user_id']])}}">权值</a>
                                <a title="删除" href="{{route("Administrators.delete",['id'=>$v['user_id']])}}" onclick="DELETEall(this);return false;">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <?php
                    $tmp = '';
                    \App\ClassLib\Category::treeMap($result,function($v) use(&$tmp) {
                        $tmp .= '<tr class="cen" data-tt-id="'.$v['user_id'].'" data-tt-parent-id="'.$v['fid'].'">';
                        $checkbox = '';
                        $tmp .= '<td>'.$v['user_id'].'</td>';
                        $tmp .= '<td id="sp-'.$v['user_id'].'"><span class="'.(!empty($v['child']) ? 'folder' : 'file').'">'.$v['username'].'</span>'.$checkbox.'</td>';
//                        if(stripos($v['url'],'javascript') === 0) {
//                            $tmp .= '<td></td>';
//                        }else{
                            $tmp .= '<td>'.($v['ban'] == \App\Model\AdminUser::BAN_NO ? '正常' : '禁止').'</td>';
//                        }
                        $tmp .= '<td>'.$v['created_at'].'</td>';
//                        $tmp .= '<td><input data-node_id="'.$v['node_id'].'" value="'.$v['sortid'].'" style="width:70px;" class="form-control form-boxed"  placeholder="请输入ID" type="text"></td>';
//                        $tmp .= '<td><a  href="">'.($v['nav'] == \App\Model\AdminNodes::NAV_SHOW ? '隐藏' : '显示').'</a></td>';
                        $tmp .= '<td>';
                        $tmp .= '<a class="mr-5" href="'.route("Administrators.create",['id'=>$v['user_id']]).'">新增</a>';
                        $tmp .= '<a class="mr-5" href="'.route("Administrators.edit",['id'=>$v['user_id']]).'">权值</a>';
                        if(empty($v['child']))
                            $tmp .= '<a class="mr-5" href="'.route("Administrators.delete",['id'=>$v['user_id']]).'" onclick="DELETEall(this);return false;">删除</a>';
                        $tmp .= '</td>';
                        $tmp .= '</tr>';
                    });
                    echo $tmp;
                    ?>
                @endif
                </tbody>
            </table>
            @if(!empty($content))
            {{ $content->links("pagination.default") }}
            @endif
        </main>
    @endsection  {{--nav--}}
    @section('footer')
    @endsection  {{--nav--}}
    @section('js')
        <script type="text/javascript" src="/public/layui/layui.js"></script>
        <script type="text/javascript" src="/public/common/treeTable/jquery.treetable.js"></script>
        <script>
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
                $("#close").click(function () {
                    $(this).parents(".alert-success").hide();
                });
            });
            function DELETEall(node) {
                layer.confirm('确定要删除吗？', {
                    btn: ['确定', '取消'] //可以无限个按钮
                    ,yes: function(index, layero){
                        var url = node.href;
                        var to = "{{csrf_token()}}";
                        $.ajax({
                            url:url,
                            data: {'_token':to},
                            type:'DELETE',
                            success:function (result) {
                                //判断result结果
                                if (result.error){
                                    layer.msg(result.msg, {icon: 6});
                                    window.location.reload();
                                }else{
                                    layer.msg(result.msg, {icon: 5});
                                }
                            }
                        })
                    }
                }, function(index){
                    return false;
                });
            };
        </script>
    @endsection  {{--nav--}}
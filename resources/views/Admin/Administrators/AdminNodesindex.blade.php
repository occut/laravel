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
                    <li><a href="#">模块管理</a><i class="icon-angle-right"></i></li>
                </ul>
            </div>
            <div style="margin:5px 0px">
                <button class="btn btn-secondary-outline"><a href="{{route("AdminNodes.create")}}">添加</a></button>
            </div>
            @if (Session::has('msg'))
                <div class="alert alert-success">
                    {{Session::get('msg')}}
                </div>
        @endif
            <!--开始::内容-->
            <table class="table table-bordered table-striped table-hover" id="nodetree">
                <thead>
                <tr>
                    <th>节点名</th>
                    <th>链接</th>
                    <th>权值</th>
                    <th>排序</th>
                    <th>导航</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($result))
                    <?php
                    $tmp = '';
                    \App\Functions\Category::treeMap($result,function($v) use(&$tmp) {
                        $tmp .= '<tr class="cen" data-tt-id="'.$v['node_id'].'" data-tt-parent-id="'.$v['pid'].'">';
                        $checkbox = '';
                        $tmp .= '<td id="sp-'.$v['node_id'].'"><span class="'.(!empty($v['child']) ? 'folder' : 'file').'">'.$v['nodename'].'</span>'.$checkbox.'</td>';
                        if(stripos($v['url'],'javascript') === 0) {
                            $tmp .= '<td></td>';
                        }else{
                            $tmp .= '<td>'.$v['url'].'</td>';
                        }
                        $tmp .= '<td>'.$v['auth'].'</td>';
                        $tmp .= '<td><input data-node_id="'.$v['node_id'].'" value="'.$v['sortid'].'" style="width:70px;" class="form-control form-boxed"  placeholder="请输入ID" type="text"></td>';
                        $tmp .= '<td><a  href="">'.($v['nav'] == \App\Model\AdminNodes::NAV_SHOW ? '隐藏' : '显示').'</a></td>';
                        $tmp .= '<td>';
                        $tmp .= '<a class="mr-5" href="'.route("AdminNodes.create",['node_id'=>$v['node_id']]).'">新增</a>';
                        $tmp .= '<a class="mr-5" href="">编辑</a>';
                        if(empty($v['child'])) $tmp .= '<a class="mr-5">删除</a>';
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
        <script type="text/javascript">
            $(function(){
                /**
                 * 初始化树形表格
                 */
                $("#roletree").treetable({expandable: true});
            });
        </script>
        <script type="text/javascript">
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
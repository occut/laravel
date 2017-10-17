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
            <div style="height:10px;">
            </div>
            <div style="margin:15px 0px">
                @if(Session::get('user')['user_id'] == 1)
                    <button class="btn btn-secondary-outline"><a href="{{route("AdminNodes.create")}}">添加</a></button>
                @endif
            </div>
            <section class="page-hd" style="display: none">
                @if (Session::has('msg'))
                    <div class="alert alert-success" style="width: auto;padding: 10px;cursor: pointer">{{Session::get('msg')}}</div>
                    <p>{{Session::get('error')}}</p>
                @endif
            </section>
            <!--开始::内容-->
            <table class="table table-bordered table-striped table-hover treetable" id="nodetree">
                <thead>
                <tr>
                    <th>id</th>
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
                    \App\ClassLib\Category::treeMap($result,function($v) use(&$tmp) {
                        $tmp .= '<tr class="cen" data-tt-id="'.$v['node_id'].'" data-tt-parent-id="'.$v['pid'].'">';
                        $checkbox = '';
                        $tmp .= '<td>'.$v['node_id'].'</td>';
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
                        $tmp .= '<a class="mr-5" href="'.route("AdminNodes.edit",['node_id'=>$v['node_id']]).'" >编辑</a>';
                        if(empty($v['child']))
                            $tmp .= '<a class="mr-5" href="'.route("AdminNodes.delete",['node_id'=>$v['node_id']]).'" onclick="deletes(this);return false;">删除</a>';
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
          function deletes(obj) {
              layer.confirm('确定要删除吗？', {
                  btn: ['确定', '取消'] //可以无限个按钮
                  ,yes: function(index, layero){
                      var url = obj.href;
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
          }
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
                $("#close").click(function () {
                   $(this).parents(".alert-success").hide();
                });
            });
        </script>
    @endsection  {{--nav--}}
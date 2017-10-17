@extends('Admin.layouts.layout_admin')
@section('css')
@endsection  {{--css--}}
@section('nav')
@endsection  {{--nav--}}
@section('header')
    <header class="top-hd">
        <div class="hd-lt">
            <a class="icon-reorder"></a>
        </div>
    </header>
@endsection
@section('main')
    <main class="main-cont content mCustomScrollbar">
        <div class="page-wrap">
            <!--开始::内容-->
            <section class="page-hd" style="display: none">
                @if (Session::has('msg'))
                    <div class="alert alert-success" style="width: auto;padding: 10px;cursor: pointer">{{Session::get('msg')}}</div>
                @endif
            </section>
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li><a href="{{route('Category.index')}}" class="layui-this">所有分类</a></li>
                    <li><a href="{{route('Category.create')}}">添加分类</a></li>
                </ul>
                {{--所有活动Start--}}
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <form action="" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="site" placeholder="请输入分类动名称..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="form-cont">
                                        <div class="layui-input-inline">
                                            <input type="submit" class="layui-btn" value="搜索" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-small">开启</button>
                            <button class="layui-btn layui-btn-small">关闭</button>
                            <button class="layui-btn layui-btn-small">删除</button>
                        </div>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th  style="text-align: center">
                                    <input type="checkbox">
                                </th>
                                <th>ID</th>
                                <th>分类名称</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($list as $vo)--}}
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>ID</td>
                                    <td>分类名称</td>
                                    <td>
                                        <a href="">编辑</a>
                                        <a href="" onclick="deletes(this);return false;">删除</a>
                                    </td>
                                </tr>
                            {{--@endforeach--}}
                            </tbody>
                        </table>
                        {{--分页Start--}}
                        <div class="panel panel-default">
                            <div class="panel-bd">
                                <div class="pagination"></div>
                            </div>
                        </div>
                        {{--分页Over--}}
                    </div>
                    {{--所有活动Over--}}
                </div>
            </div>
        </div>
        <!--开始::结束-->
        </div>

    </main>
@endsection  {{--nav--}}
@section('footer')
@endsection  {{--nav--}}
@section('js')
    <script>
        function deletes(obj) {
            layer.confirm('确定要删除吗？', {
                btn: ['确定', '取消'] //可以无限个按钮
                ,yes: function(index, layero){
                    var url = obj.href;
                    $.ajax({
                        url:url,
                        data: {'_token':"{{csrf_token()}}"},
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
        {{--点击图片上传图片Start--}}
        function imgClick() {
            document.getElementById("fileToUpload").click();
        }
        {{--点击图片上传图片Over--}}
        //        分页Start
        $(".pagination").createPage({
            pageCount:10,
            current:1,
            backFn:function(p){
                console.log(p);
            }
        });
        //        分页Over
        //        时间选择Start
        layui.use('laydate', function(){
            var laydate = layui.laydate;
            //执行一个laydate实例
            laydate.render({
                elem: '#starttime' //开始时间
                ,format: 'yyyy-MM-dd'
            });
            //自定义格式
            laydate.render({
                elem: '#endtime'//结束时间
                ,format: 'yyyy-MM-dd'
            });
        });
        //        时间选择Over
        //        富文本编辑器Start
        layui.use('layedit', function(){
            var layedit = layui.layedit;
            layedit.build('editor'); //建立编辑器
        });
        //        富文本编辑器Over
        //        提示框Start
        if($(".page-hd .alert").text()!=""){
            layer.msg($(".page-hd .alert").text());
        }
        //        提示框Over
    </script>
@endsection  {{--nav--}}
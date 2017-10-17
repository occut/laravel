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
                    <li><a href="{{route('Category.index')}}">所有分类</a></li>
                    <li><a href="{{route('Category.create')}}" class="layui-this">添加分类</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--添加活动Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Activity.store')}}" method="post" class="layui-form">
                            <div class="form-group-col-2">
                                <div class="form-label">分类名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="activity_name" placeholder="请输入分类名称..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label"></div>
                                <div class="form-cont">
                                    {{csrf_field()}}
                                    <input type="submit" class="btn btn-primary" value="提交表单"/>
                                    <input type="reset" class="btn btn-disabled" value="禁止" />
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--添加区服Over--}}
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
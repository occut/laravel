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
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li><a href="{{route('Card.index')}}">所有卡类</a></li>
                    <li><a href="{{route('Card.create')}}" class="layui-this">添加卡类</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--添加区服Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Administrators.store')}}" method="post" class="layui-form">
                            <div class="form-group-col-2">
                                <div class="form-label">卡类类型：</div>
                                <div class="form-cont" style="width: 300px">
                                    <select name="city" lay-verify="">
                                        <option value="">全部</option>
                                        <option value="010">新手卡</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">VIP等级：</div>
                                <div class="form-cont" style="width: 300px">
                                    <select name="city" lay-verify="">
                                        <option>请选择VIP等级</option>
                                        <option value="0">普通会员</option>
                                        <option value="0">VIP1</option>
                                        <option value="0">VIP2</option>
                                        <option value="0">VIP3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">区服：</div>
                                <div class="form-cont">
                                    <input type="text" name="site" placeholder="请输入卡类名称..." class="form-control form-boxed" style="width: 300px">

                                </div>

                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="status" value="0" title="开启">
                                    <input type="radio" name="status" value="1" title="关闭" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">调用接口：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="api" value="0" title="是">
                                    <input type="radio" name="api" value="1" title="否" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">是否通服：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="stop" value="0" title="通服">
                                    <input type="radio" name="stop" value="1" title="不通服" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">是否推广礼包：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="prize" value="0" title="平台礼包">
                                    <input type="radio" name="prize" value="1" title="推广礼包" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">开始时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" id="starttime" style="width: 300px" placeholder="开始时间...">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">结束时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" id="endtime" style="width: 300px" placeholder="结束时间...">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">描述：</div>
                                <div class="layui-input-block">
                                    <textarea id="editor" style="display: none;"></textarea>                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label"></div>
                                <div class="form-cont">
                                    {{csrf_field()}}
                                    <input type="submit" class="btn btn-primary" value="提交表单" />
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

    </script>
@endsection  {{--nav--}}
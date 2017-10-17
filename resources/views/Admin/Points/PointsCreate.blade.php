@extends('Admin.layouts.layout_admin')
@section('css')
@endsection  {{--css--}}
@section('nav')
@endsection  {{--nav--}}
@section('header')
@endsection
@section('main')
    <main class="main-cont content mCustomScrollbar">
        <div class="page-wrap">
            <!--开始::内容-->
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li><a href="{{route('Points.index')}}">所有积分任务</a></li>
                    <li><a href="{{route('Points.create')}}" class="layui-this">添加积分任务</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Activity.store')}}" method="post" class="layui-form">
                            <div class="form-group-col-2">
                                <div class="form-label">任务名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="activity_name" placeholder="请输入任务名称..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="form-cont">
                                    <input type="radio" name="status" value="0" title="关闭" checked>
                                    <input type="radio" name="status" value="1" title="开启">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">开始时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="start_time" class="layui-input" id="starttime" style="width: 300px" placeholder="开始时间..." required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">结束时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="end_time" class="layui-input" id="endtime" style="width: 300px" placeholder="结束时间..." required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">时效任务：</div>
                                <div class="form-cont">
                                    <input type="radio" name="status" value="0" title="否" checked>
                                    <input type="radio" name="status" value="1" title="是">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">积分奖励：</div>
                                <div class="form-cont">
                                    <input type="text" name="percentage" placeholder="积分奖励..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">函数标签：</div>
                                <div class="form-cont">
                                    <input type="text" name="keyword" placeholder="函数标签..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">任务完成链接：</div>
                                <div class="form-cont">
                                    <input type="text" name="website" placeholder="任务完成链接..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">描述：</div>
                                <div class="form-cont">
                                    <textarea type="text" name="keyword" placeholder="" class="form-control form-boxed" style="width: 300px" required ></textarea>
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
                    {{--所有账户Over--}}
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
        //        时间选择Start
        layui.use('laydate', function(){
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#startTime' //指定元素
            });
            laydate.render({
                elem: '#endTime' //指定元素
            });
        });
        //        时间选择Over

    </script>
@endsection  {{--nav--}}
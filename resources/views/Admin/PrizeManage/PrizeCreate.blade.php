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
                    <li><a href="{{route('Prize.index')}}">所有奖品</a></li>
                    <li"><a href="{{route('Prize.create')}}" class="layui-this>添加奖品</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Activity.store')}}" method="post" class="layui-form">
                            <div class="form-group-col-2">
                                <div class="form-label">抽奖权限：</div>
                                <div class="form-cont" style="width: 300px">
                                    <select name="activity_types" required >
                                        <option>请选择抽奖权限</option>
                                        <option>普通抽奖</option>
                                        <option>会员抽奖</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">奖品名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="activity_name" placeholder="请输入奖品名称..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="form-cont">
                                    <input type="radio" name="status" value="0" title="上架" checked>
                                    <input type="radio" name="status" value="1" title="下架">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">中奖概率：</div>
                                <div class="form-cont">
                                    <input type="number" name="activity_name" placeholder="请输入奖品名称..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">礼包卡：</div>
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
@extends('Admin.layouts.layout_admin')
@section('css')
@endsection  {{--css--}}
@section('nav')
@endsection  {{--nav--}}
@section('header')
@endsection
@section('main')
    <br/>
    <main class="main-cont content mCustomScrollbar">
        <div class="page-wrap" style="">
            <!--开始::内容-->

            <section class="page-hd">
                <header>
                    <h2 class="title">编辑账号</h2>
                </header>
                <hr>
            </section>
            <form action="{{route('Account.update',['id'=>$content->account_id])}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group-col-2">
                    <div class="form-label">角色名：</div>
                    <div class="form-cont">
                        <input type="text" name="account_name" value="{{$content->account_name}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">账号：</div>
                    <div class="form-cont">
                        <input type="text" name="account_number" value="{{$content->account_number}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">充值明细：</div>
                    <div class="form-cont">
                        <input type="text" name="account_recharge" value="{{$content->account_recharge}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">等级：</div>
                    <div class="form-cont">
                        <input type="text" name="account_grade" value="{{$content->account_grade}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">首次登陆设备码：</div>
                    <div class="form-cont">
                        <input type="text" name="account_startcode" value="{{$content->account_startcode}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">首次登录IP：</div>
                    <div class="form-cont">
                        <input type="text" name="account_startip" value="{{$content->account_startip}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">最后登录IP：</div>
                    <div class="form-cont">
                        <input type="text" name="account_endip" value="{{$content->account_endip}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">最后登录设备码：</div>
                    <div class="form-cont">
                        <input type="text" name="account_endcode" value="{{$content->account_endcode}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">注册时间：</div>
                    <div class="form-cont">
                        <input type="text" name="account_time" id="registerTime" value="{{$content->account_time}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">渠道归属：</div>
                    <div class="form-cont">
                        <input type="text" name="account_channel" value="{{$content->account_channel}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">在线时长：</div>
                    <div class="form-cont">
                        <input type="text" name="account_online" value="{{$content->account_online}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">最后退出游戏时间：</div>
                    <div class="form-cont">
                        <input type="text" name="account_out" value="{{$content->account_out}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">安卓和IOS归属判定：</div>
                    <div class="form-cont">
                        <input type="text" name="account_equipment" value="{{$content->account_equipment}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">所在服务器：</div>
                    <div class="form-cont">
                        <input type="text" name="account_server" value="{{$content->account_server}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">游戏曾用名：</div>
                    <div class="form-cont">
                        <input type="text" name="account_nameusedbefore" value="{{$content->account_nameusedbefore}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label"></div>
                    <div class="form-cont">
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-primary" value="提交表单" />
                    </div>
                </div>
            </form>
            <br/>
            <!--开始::结束-->
        </div>
        <br/>
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
                elem: '#registerTime' //指定元素
            });
        });
        //        时间选择Over

    </script>
@endsection  {{--nav--}}
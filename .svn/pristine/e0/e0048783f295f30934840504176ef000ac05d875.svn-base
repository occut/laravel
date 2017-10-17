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
                    {{--<li><a href="{{route('Promoter.index')}}">所有推广用户</a></li>--}}
                    <li><a href="{{route('Promoter.create')}}" class='layui-this'>编辑用户</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--添加推广员Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Register.update',['id'=>$content->ac_id])}}" method="post" class="layui-form">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group-col-2">
                                <div class="form-label">用户名：</div>
                                <div class="form-cont">
                                    <input type="text"  value="{{$content->ac_name}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" readonly >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">注册游戏：</div>
                                <div class="form-cont">
                                    <input type="text"   value="{{$content->ac_game}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" readonly >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">注册时间：</div>
                                <div class="form-cont">
                                    <input type="text" id="startTime" name="ac_time" value="{{$content->ac_time}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">注册IP：</div>
                                <div class="form-cont">
                                    <input type="text" name="ac_ip" value="{{$content->ac_ip}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">游戏角色：</div>
                                <div class="form-cont">
                                    <input type="text"  value="{{$content->ac_role}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" readonly >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">分区：</div>
                                <div class="form-cont">
                                    <input type="text"  value="{{$content->ac_partition}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" readonly >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">设备编号：</div>
                                <div class="form-cont">
                                    <input type="text" name="ac_number" value="{{$content->ac_number}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">设备类型：</div>
                                <div class="form-cont" style="width: 300px">
                                    <select name="ac_type" lay-verify="">
                                        {{--<option value="">请选择设备类型</option>--}}
                                        <option value="0" {{'0' == $content->ac_type ? 'selected' : ''}}>PC</option>
                                        <option value="1" {{'1' == $content->ac_type ? 'selected' : ''}}>安卓</option>
                                        <option value="2" {{'2' == $content->ac_type ? 'selected' : ''}}>苹果</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">等  级：</div>
                                <div class="form-cont">
                                    <input type="text" name="ac_grade" value="{{$content->ac_grade}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">推广人员：</div>
                                <div class="form-cont">
                                    <input type="text"  value="{{\App\Model\Promoter::account($content->ac_promoters)['pr_name']}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" readonly >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">所属专员：</div>
                                <div class="form-cont">
                                    <input type="text"  value="{{\App\Model\AdminUser::Adminselect($content->ac_adminuser)['username']}}" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" readonly >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label"></div>
                                <div class="form-cont">
                                    {{csrf_field()}}
                                    <input type="submit" class="btn btn-primary" value="提交表单"/>
                                    {{--<input type="reset" class="btn btn-disabled" value="禁止" />--}}
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                    {{--所有推广员Over--}}
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
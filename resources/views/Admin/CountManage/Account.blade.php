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
                    <li class="layui-this">所有账户</li>
                </ul>
            <div class="layui-tab-content">
                {{--所有账户Start--}}
                <div class="layui-tab-item layui-show">
                    <form action="{{route('Account.index')}}">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <div class="layui-input-inline" style="width: 200px;">
                                    <input type="text" name="account_number" value="{{App\Functions\LogAction::input('account_number')}}" placeholder="请输入账号..." class="form-control form-boxed">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline" style="width: 200px;">
                                    <input type="text" name="account_grade" value="{{App\Functions\LogAction::input('account_grade')}}" placeholder="等级..." class="form-control form-boxed">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline" style="width: 200px;">
                                    <input type="text" name="account_time" value="{{App\Functions\LogAction::input('account_time')}}" id="registerTime" placeholder="注册时间" class="form-control form-boxed">
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
                        <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Account.delete",['id'=>'all'])}}','{{csrf_token()}}')">删除</button>
                    </div>
                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {{Session::get('msg')}}
                        </div>
                    @endif
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th  style="text-align: center">
                                <input type="checkbox" id="dcheckboxAll">
                            </th>
                            <th>ID</th>
                            <th>角色名</th>
                            <th>账号</th>
                            <th>充值明细</th>
                            <th>等级</th>
                            <th>首次登陆设备码</th>
                            <th>首次登录IP</th>
                            <th>最后登录IP</th>
                            <th>最后登录设备码</th>
                            <th>注册时间</th>
                            <th>渠道归属</th>
                            <th>在线时长</th>
                            <th>最后退出游戏时间</th>
                            <th>安卓和IOS归属判定</th>
                            <th>所在服务器</th>
                            <th>游戏曾用名</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($content))
                            @foreach($content as $k=>$v)
                                <tr class="cen">
                                    <td>
                                        <input type="checkbox" id="{{$v->account_id}}" value="{{$v->account_id}}" name="dcheckbox">
                                    </td>
                                    <td>{{$v->account_id}}</td>
                                    <td>{{$v->account_name}}</td>
                                    <td>{{$v->account_number}}</td>
                                    <td>{{$v->account_recharge}}</td>
                                    <td>{{$v->account_grade}}</td>
                                    <td>{{$v->account_startcode}}</td>
                                    <td>{{$v->account_startip}}</td>
                                    <td>{{$v->account_endip}}</td>
                                    <td>{{$v->account_endcode}}</td>
                                    <td>{{$v->account_time}}</td>
                                    <td>{{$v->account_channel}}</td>
                                    <td>{{$v->account_online}}</td>
                                    <td>{{$v->account_out}}</td>
                                    <td>{{$v->account_equipment}}</td>
                                    <td>{{$v->account_server}}</td>
                                    <td>{{$v->account_nameusedbefore}}</td>
                                    <td>
                                        <a href="{{route("Account.edit",['id'=>$v['account_id']])}}">编辑</a>
                                        <a href="{{route("Account.delete",['id'=>$v['account_id']])}}" onclick="deletes(this,'{{csrf_token()}}');return false;">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{--分页Start--}}
                    @if(!empty($content))
                        {{ $content->links("pagination.default") }}
                    @endif
                    {{--分页Over--}}
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
                elem: '#registerTime' //指定元素
            });
        });
        //        时间选择Over


    </script>
@endsection  {{--nav--}}
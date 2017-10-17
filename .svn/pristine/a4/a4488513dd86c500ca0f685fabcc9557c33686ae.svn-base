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
                    <li><a href="{{route('Register.index')}}" class="layui-this">实时充值</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Recharge.index')}}"  class="layui-form">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="re_account" value="{{App\Functions\LogAction::input("re_account")}}" placeholder="请输入充值账号..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="re_order" value="{{App\Functions\LogAction::input("re_order")}}" placeholder="请输入订单号..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="re_channel" lay-verify="">
                                            <option value="">请选择所属渠道</option>
                                            @foreach($promoters as $k=>$v)
                                                <option value="{{$v->pr_id}}" {{$v->pr_id == App\Functions\LogAction::input('ac_promoters') ? 'selected' : ''}}>{{$v->pr_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="re_type" lay-verify="">
                                            <option value="">请选择设备类型</option>
                                            <option value="0" {{'0' == App\Functions\LogAction::input('re_type') ? 'selected' : ''}}>PC</option>
                                            <option value="1" {{'1' == App\Functions\LogAction::input('re_type') ? 'selected' : ''}}>安卓</option>
                                            <option value="2" {{'2' == App\Functions\LogAction::input('re_type') ? 'selected' : ''}}>苹果</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="re_service" lay-verify="">
                                            <option value="">请选择区服</option>
                                            <option value="0" {{'0' == App\Functions\LogAction::input('re_service') ? 'selected' : ''}}>区服</option>
                                            <option value="1" {{'1' == App\Functions\LogAction::input('re_service') ? 'selected' : ''}}>区服</option>
                                            <option value="2" {{'2' == App\Functions\LogAction::input('re_service') ? 'selected' : ''}}>区服</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="re_state" lay-verify="">
                                            <option value="">请选择充值状态</option>
                                            <option value="0" {{'0' == App\Functions\LogAction::input('re_state') ? 'selected' : ''}}>成功</option>
                                            <option value="1" {{'1' == App\Functions\LogAction::input('re_state') ? 'selected' : ''}}>失败</option>
                                            <option value="2" {{'2' == App\Functions\LogAction::input('re_state') ? 'selected' : ''}}>待支付</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="re_mode" lay-verify="">
                                            <option value="">请选择充值方式</option>
                                            <option value="0" {{'0' == App\Functions\LogAction::input('re_mode') ? 'selected' : ''}}>平台币</option>
                                            <option value="1" {{'1' == App\Functions\LogAction::input('re_mode') ? 'selected' : ''}}>代金券</option>
                                            <option value="2" {{'2' == App\Functions\LogAction::input('re_mode') ? 'selected' : ''}}>微信支付</option>
                                            <option value="3" {{'3' == App\Functions\LogAction::input('re_mode') ? 'selected' : ''}}>平台币支付</option>
                                            <option value="4" {{'4' == App\Functions\LogAction::input('re_mode') ? 'selected' : ''}}>支付宝快捷支付</option>
                                        </select>
                                    </div>
                                </div>
                                {{--<div class="layui-inline">--}}
                                    {{--<div class="layui-input-inline" style="width: 200px;">--}}
                                        {{--<select name="city" lay-verify="">--}}
                                            {{--<option>是否参与</option>--}}
                                            {{--<option value="0">参与</option>--}}
                                            {{--<option value="1">不参与</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" id="startTime" name="startTime" value="{{App\Functions\LogAction::input("startTime")}}" placeholder="开始时间" class="form-control form-boxed">
                                    </div>
                                    <div class="layui-form-mid">-</div>
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" id="endTime"  name="endTime" value="{{App\Functions\LogAction::input("endTime")}}" placeholder="结束时间" class="form-control form-boxed">
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
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Recharge.delete",['id'=>'all'])}}','{{csrf_token()}}')">删除</button>
                        </div>
                        <section class="sec" style="display: none">
                            @if (Session::has('msg'))
                                <div class="al" style="width: auto;padding: 10px;cursor: pointer">{{Session::get('msg')}}</div>
                                <p>{{Session::get('error')}}</p>
                            @endif
                        </section>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th  style="text-align: center">
                                    <input type="checkbox" id="dcheckboxAll">
                                </th>
                                <th>ID</th>
                                <th>订单号</th>
                                <th>游戏</th>
                                <th>区服</th>
                                <th>账号</th>
                                <th>角色名称</th>
                                <th>角色等级</th>
                                <th>金额</th>
                                <th>折扣</th>
                                <th>原价</th>
                                <th>时间</th>
                                <th>充值方式	</th>
                                <th>设备类型</th>
                                <th>注册渠道</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($content))
                                @foreach($content as $k=>$v)
                                    <tr class="cen">
                                        <td>
                                            <input type="checkbox" id="{{$v->re_id}}" value="{{$v->re_id}}" name="dcheckbox">
                                        </td>
                                        <td>{{$v->re_id}}</td>
                                        <td><a href="#">{{$v->re_order}}</a></td>
                                        <td>{{$v->re_game}}</td>
                                        <td>{{$v->re_service}}</td>
                                        <td>{{$v->re_account}}</td>
                                        <td>{{$v->re_name}}</td>
                                        <td>{{$v->re_grade}}</td>
                                        <td>{{$v->re_money}}</td>
                                        <td>{{$v->re_discount}}</td>
                                        <td>{{$v->re_price}}</td>
                                        <td>{{$v->re_time}}</td>
                                        <td>{{\App\Functions\Method::RechargeMode($v->re_mode)}}</td>
                                        <td>{{\App\Functions\Method::RechargeType($v->re_type)}}</td>
                                        <td>{{\App\Model\Promoter::account($v->re_channel)['pr_name']}}</td>
                                        <td>{{\App\Functions\Method::RechargeState($v->re_state)}}</td>
                                        <td>
                                            {{--<a href="{{route("Register.edit",['id'=>$v->re_id])}}">编辑</a>--}}
                                            <a title="删除" href="{{route("Recharge.delete",['id'=>$v->re_id])}}" onclick="deletes(this,'{{csrf_token()}}');return false;">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            {{--<tr>--}}
                                {{--<td>--}}
                                    {{--<input type="checkbox">--}}
                                {{--</td>--}}
                                {{--<td>1</td>--}}
                                {{--<td>订单号</td>--}}
                                {{--<td>游戏</td>--}}
                                {{--<td>区服</td>--}}
                                {{--<td>账号</td>--}}
                                {{--<td>角色名称</td>--}}
                                {{--<td>角色等级</td>--}}
                                {{--<td>金额</td>--}}
                                {{--<td>折扣</td>--}}
                                {{--<td>原价</td>--}}
                                {{--<td>时间</td>--}}
                                {{--<td>充值方式	</td>--}}
                                {{--<td>设备类型</td>--}}
                                {{--<td>注册渠道</td>--}}
                                {{--<td>状态</td>--}}
                                {{--<td>--}}
                                    {{--<a href="#">编辑</a>--}}
                                    {{--<a href="#">删除</a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            </tbody>
                        </table>
                        {{--分页Start--}}
                        @if(!empty($content))
                            {{ $content->links("pagination.default") }}
                        @endif
                        <br>
                        <br>
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
                elem: '#startTime' //指定元素
            });
            laydate.render({
                elem: '#endTime' //指定元素
            });
        });
        //        时间选择Over
    </script>
@endsection  {{--nav--}}
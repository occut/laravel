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
                    <li class="layui-this">用户充值统计(游戏用户)</li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Administrators.store')}}" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" placeholder="请输入充值账号..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择渠道</option>
                                            <option value="0">渠道一</option>
                                            <option value="1">渠道二</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择设备类型</option>
                                            <option value="0">安卓</option>
                                            <option value="1">苹果</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择游戏</option>
                                            <option value="0">游戏</option>
                                            <option value="1">游戏</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择区服</option>
                                            <option value="0">区服</option>
                                            <option value="1">区服</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择充值状态</option>
                                            <option value="0">待支付</option>
                                            <option value="1">成功</option>
                                            <option value="2">失败</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择游戏到账状态</option>
                                            <option value="0">待支付</option>
                                            <option value="1">成功</option>
                                            <option value="2">失败</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择充值方式</option>
                                            <option value="0">平台币</option>
                                            <option value="1">代金券</option>
                                            <option value="2">微信支付</option>
                                            <option value="1">平台币支付</option>
                                            <option value="2">支付宝快捷支付</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" placeholder="订单号..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" id="startTime" placeholder="开始时间" class="form-control form-boxed">
                                    </div>
                                    <div class="layui-form-mid">-</div>
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" id="endTime" placeholder="结束时间" class="form-control form-boxed">
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
                            <button class="layui-btn layui-btn-small">删除</button>
                        </div>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th  style="text-align: center">
                                    <input type="checkbox">
                                </th>
                                <th>ID</th>
                                <th>订单号</th>
                                <th>游戏</th>
                                <th>区服</th>
                                <th>账号</th>
                                <th>角色名称	</th>
                                <th>角色等级	</th>
                                <th>金额</th>
                                <th>折扣</th>
                                <th>原价</th>
                                <th>充值方式	</th>
                                <th>时间</th>
                                <th>设备类型	</th>
                                <th>注册渠道	</th>
                                <th>订单状态	</th>
                                <th>游戏订单状态	</th>
                                <th>是否结算	</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>1</td>
                                <th>订单号</th>
                                <th>游戏</th>
                                <th>区服</th>
                                <th>账号</th>
                                <th>角色名称	</th>
                                <th>角色等级	</th>
                                <th>金额</th>
                                <th>折扣</th>
                                <th>原价</th>
                                <th>充值方式	</th>
                                <th>时间</th>
                                <th>设备类型	</th>
                                <th>注册渠道	</th>
                                <th>订单状态	</th>
                                <th>游戏订单状态	</th>
                                <th>是否结算	</th>
                                <td>
                                    <a href="#">编辑</a>
                                    <a href="#">删除</a>
                                </td>
                            </tr>
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
        //分页Start
        $(".pagination").createPage({
            pageCount:10,
            current:1,
            backFn:function(p){
                console.log(p);
            }
        });
        //        分页Over
    </script>
@endsection  {{--nav--}}
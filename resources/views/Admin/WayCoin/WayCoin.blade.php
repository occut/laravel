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
                    <li class="layui-this">渠道充值统计(游戏用户)</li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Administrators.store')}}" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" placeholder="请输入渠道用户名..." class="form-control form-boxed">
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
                                            <option>请选择一级渠道</option>
                                            <option value="0">一级渠道</option>
                                            <option value="1">游一级渠道</option>
                                        </select>
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
                                <th>渠道号</th>
                                <th>所属专员	</th>
                                <th>充值金额	</th>
                                <th>充值人数</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>1</td>
                                <td>渠道号</td>
                                <td>所属专员	</td>
                                <td>充值金额	</td>
                                <td>充值人数</td>
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
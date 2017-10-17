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
                    <li><a href="{{route('FenCheng.index')}}" class="layui-this">分成比例</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Administrators.store')}}" method="post" class="layui-form">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择游戏</option>
                                            <option value="0">游戏</option>
                                            <option value="1">游戏</option>
                                            <option value="2">游戏</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择类型</option>
                                            <option value="0">所有</option>
                                            <option value="1">CPS</option>
                                            <option value="2">CPA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择所属工会</option>
                                            <option value="0">工会</option>
                                            <option value="1">工会</option>
                                            <option value="2">工会</option>
                                        </select>
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
                                <div class="layui-input-inline" style="width: 300px;">
                                    <input type="text" placeholder="分成比例:1-100 折扣比例:0.01-1.00" class="form-control form-boxed">
                                </div>
                            <button class="layui-btn layui-btn-small">批量修改比例</button>
                            <button class="layui-btn layui-btn-small">批量修改首充</button>
                            <button class="layui-btn layui-btn-small">批量修改续充</button>
                        </div>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th  style="text-align: center">
                                    <input type="checkbox">
                                </th>
                                <th>ID</th>
                                <th>推广员</th>
                                <th>游戏名称	</th>
                                <th>推广类型	</th>
                                <th>CPA	</th>
                                <th>CPS比例</th>
                                <th>首充折扣	</th>
                                <th>续充折扣	</th>
                                <th>操作IP</th>
                                <th>操作时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>1</td>
                                <td>推广员</td>
                                <td>游戏名称	</td>
                                <td>推广类型	</td>
                                <td>CPA	</td>
                                <td>CPS比例</td>
                                <td>首充折扣	</td>
                                <td>续充折扣	</td>
                                <td>操作IP</td>
                                <td>操作时间</td>
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
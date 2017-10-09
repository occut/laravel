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
        <div class="hd-rt">
            <ul>
                <li>
                    <a href="#" target="_blank"><i class="icon-home"></i>前台访问</a>
                </li>
                <li>
                    <a><i class="icon-random"></i>清除缓存</a>
                </li>
                <li>
                    <a><i class="icon-user"></i>管理员:<em>DeathGhost</em></a>
                </li>
                <li>
                    <a><i class="icon-bell-alt"></i>系统消息</a>
                </li>
                <li>
                    <a href="javascript:void(0)" id="JsSignOut"><i class="icon-signout"></i>安全退出</a>
                </li>
            </ul>
        </div>
    </header>
@endsection
@section('main')
    <main class="main-cont content mCustomScrollbar">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{route("index.index")}}">首页</a><i class="icon-angle-right"></i></li>
                <li><a href="{{route("Administrators.index")}}">游戏管理</a><i class="icon-angle-right"></i></li>
                <li><a href="#">区服管理</a><i class="icon-angle-right"></i></li>
            </ul>
        </div>
        <div class="page-wrap">
            <!--开始::内容-->
            {{--<section class="page-hd">--}}
            {{--<header>--}}
            {{--<h2 class="title">网站信息</h2>--}}
            {{--</header>--}}
            {{--<hr>--}}
            {{--</section>--}}
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li class="layui-this">所有区服</li>
                    <li>添加区服</li>
                </ul>
                {{--所有区服Start--}}
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Administrators.store')}}" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="site" placeholder="请输入区服名称..." class="form-control form-boxed">
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
                            <button class="layui-btn layui-btn-small">推荐</button>
                            <button class="layui-btn layui-btn-small">不推荐</button>
                            <button class="layui-btn layui-btn-small">排序</button>
                            <button class="layui-btn layui-btn-small">开启</button>
                            <button class="layui-btn layui-btn-small">关闭</button>
                            <button class="layui-btn layui-btn-small">删除</button>
                        </div>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox">
                                </th>
                                <th>ID</th>
                                <th>区服名称</th>
                                <th>推荐</th>
                                <th>是否停服	</th>
                                <th>开服时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>1</td>
                                <td>推荐</td>
                                <td>区服名称	</td>
                                <td>正常</td>
                                <td>开服时间</td>
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
                    {{--所有区服Over--}}
                    {{--添加区服Start--}}
                    <div class="layui-tab-item">
                        <form action="{{route('Administrators.store')}}" method="post" class="layui-form">
                            <div class="form-group-col-2">
                                <div class="form-label">游戏名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="site" placeholder="王者荣耀" class="form-control form-boxed" style="width:300px;" readonly>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">开服名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="site" placeholder="开服名称..." class="form-control form-boxed" style="width:300px;"lay-verify="required">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">区服：</div>
                                <div class="form-cont">
                                    <input type="number" name="phone" placeholder="请填写数字..." class="form-control form-boxed" style="width:300px;" lay-verify="required" min="0">
                                    <i>*默认情况不需要修改</i>
                                </div>

                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="recommend" value="0" title="推荐">
                                    <input type="radio" name="recommend" value="1" title="不推荐" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">设备：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="phone" value="0" title="安卓">
                                    <input type="radio" name="phone" value="1" title="苹果">
                                    <input type="radio" name="phone" value="2" title="混服" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">是否显示：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="show" value="0" title="显示">
                                    <input type="radio" name="show" value="1" title="不现实" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">是否停服：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="stop" value="0" title="停服">
                                    <input type="radio" name="stop" value="1" title="不停服" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">开服时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" id="time" style="width: 300px" placeholder="开服时间...">
                                </div>
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
                elem: '#time' //指定元素
            });
        });
//        时间选择Over
    </script>
@endsection  {{--nav--}}
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
                <li><a href="#">活动管理</a><i class="icon-angle-right"></i></li>
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
                    <li class="layui-this">所有活动</li>
                    <li>添加活动</li>
                </ul>
                {{--所有活动Start--}}
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Administrators.store')}}" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>请选择活动类型</option>
                                            <option value="0">节日活动</option>
                                            <option value="1">开服活动</option>
                                            <option value="2">其他</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="site" placeholder="请输入活动名称..." class="form-control form-boxed">
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
                            <button class="layui-btn layui-btn-small">开启</button>
                            <button class="layui-btn layui-btn-small">关闭</button>
                            <button class="layui-btn layui-btn-small">删除</button>
                        </div>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th  style="text-align: center">
                                    <input type="checkbox">
                                </th>
                                <th>ID</th>
                                <th>活动名称</th>
                                <th>活动类型</th>
                                <th>状态</th>
                                <th>活动时间</th>
                                <th>内容</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>1</td>
                                <td>活动名称</td>
                                <td>活动类型</td>
                                <td>状态</td>
                                <td>活动时间</td>
                                <td>内容</td>
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
                    {{--所有活动Over--}}
                    {{--添加活动Start--}}
                    <div class="layui-tab-item">
                        <form action="{{route('Administrators.store')}}" method="post" class="layui-form">
                            <div class="form-group-col-2">
                                <div class="form-label">活动类型：</div>
                                <div class="form-cont" style="width: 300px">
                                    <select name="city" lay-verify="">
                                        <option>请选择活动</option>
                                        <option value="0">节日活动</option>
                                        <option value="1">开服活动</option>
                                        <option value="2">其他</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">活动名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="site" placeholder="请输入活动名称..." class="form-control form-boxed" style="width: 300px">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="status" value="0" title="开启">
                                    <input type="radio" name="status" value="1" title="关闭" checked>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">开始时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" id="starttime" style="width: 300px" placeholder="开始时间...">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">结束时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" id="endtime" style="width: 300px" placeholder="结束时间...">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">参加人数：</div>
                                <div class="layui-input-block">
                                   <input type="number" min="1" style="width: 300px"class="layui-input" placeholder="请填写参加人数...">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">活动奖品：</div>
                                <div class="layui-input-block">
                                    <textarea id="editor" style="display: none;"></textarea>                                </div>
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
                elem: '#starttime' //开始时间
                ,format: 'yyyy-MM-dd'
            });
            //自定义格式
            laydate.render({
                elem: '#endtime'//结束时间
                ,format: 'yyyy-MM-dd'
            });
        });
        //        时间选择Over
        //        富文本编辑器Start
        layui.use('layedit', function(){
            var layedit = layui.layedit;
            layedit.build('editor'); //建立编辑器
        });
        //        富文本编辑器Over

    </script>
@endsection  {{--nav--}}
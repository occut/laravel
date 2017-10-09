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
                <li><a href="#">游戏管理</a><i class="icon-angle-right"></i></li>
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
                    <li class="layui-this">所有游戏</li>
                    {{--<li>添加游戏</li>--}}
                </ul>
                {{--游戏管理之游戏管理Start--}}
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
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
                                <th>游戏ID</th>
                                <th>游戏名称</th>
                                <th>游戏星级</th>
                                <th>收费模式</th>
                                <th>推荐</th>
                                <th>状态</th>
                                <th>Android下载地址</th>
                                <th>Android版本</th>
                                <th>IOS下载地址</th>
                                <th>IOS版本</th>
                                <th>游戏下载数量	</th>
                                <th>语言</th>
                                <th>游戏大小	</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>1</td>
                                <td>1</td>
                                <td>打牌</td>
                                <td>★★★★★</td>
                                <td>收费模式</td>
                                <td>推荐</td>
                                <td>状态</td>
                                <td>Android下载地址</td>
                                <td>Android版本</td>
                                <td>IOS下载地址</td>
                                <td>IOS版本</td>
                                <td>游戏下载数量	</td>
                                <td>语言</td>
                                <td>游戏大小	</td>
                                <td>
                                    <a href="#">编辑</a>
                                    <a href="#">删除</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="panel panel-default">
                            <div class="panel-bd">
                                <div class="pagination"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    {{--游戏管理之游戏管理Over--}}
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
        function imgClick() {
            document.getElementById("fileToUpload").click();
        }
        $(".pagination").createPage({
            pageCount:10,
            current:1,
            backFn:function(p){
                console.log(p);
            }
        });
    </script>
@endsection  {{--nav--}}
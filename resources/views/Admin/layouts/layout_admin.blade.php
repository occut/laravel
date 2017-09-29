<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台管理系统-HTML5后台管理系统</title>
    <meta name="keywords"  content="设置关键词..." />
    <meta name="description" content="设置描述..." />
    <meta name="author" content="DeathGhost" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link rel="icon" href="/public/images/icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/style.css" />

    @section('css')
    @show  {{--css--}}
</head>
<body>
<div class="main-wrap">
        <div class="side-nav">
            <div class="side-logo">
                <div class="logo">
				<span class="logo-ico">
					<i class="i-l-1"></i>
					<i class="i-l-2"></i>
					<i class="i-l-3"></i>
				</span>
                    <strong>模块化后台管理模板</strong>
                </div>
            </div>
            <nav class="side-menu content mCustomScrollbar" data-mcs-theme="minimal-dark">
                <h2>
                    <a href="index.html" class="InitialPage"><i class="icon-dashboard"></i>数据概况</a>
                </h2>
                <ul>
                    <li>
                        <dl>
                            <dt>
                                <i class="icon-columns"></i>用户管理<i class="icon-angle-right"></i>
                            </dt>
                            <dd>
                                <a href="{{route("Administrators.index")}}">管理员账号</a>
                            </dd>
                            <dd>
                                <a href="{{route("AdminRole.index")}}">角色管理</a>
                            </dd>
                            <dd>
                                <a href="{{route("AdminNodes.index")}}">模块管理</a>
                            </dd>
                        </dl>
                    </li>
                </ul>
            </nav>
            <footer class="side-footer">© DeathGhost 版权所有</footer>
        </div>
    @section('nav')
    @show  {{--nav--}}
    <div class="content-wrap">
        @section('header')
        @show  {{--header--}}
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
        @section('main')
        @show  {{--main--}}
        @section('footer')
        @show  {{--footer--}}
            <footer class="btm-ft">
                <p class="clear">
                    <span class="fl">©Copyright 2016 <a href="#" title="DeathGhost" target="_blank">DeathGhost.cn</a></span>
                    <span class="fr text-info">
					<em class="uppercase">
						<i class="icon-user"></i>
						author:deathghost
					</em> |
					<em class="uppercase"><i class="icon-envelope-alt"></i>
						更多模板： <a href="http://www.mycodes.net/" target="_blank">源码之家</a>
					</em>
					<a onclick="reciprocate()" class="text-primary"><i class="icon-qrcode"></i>捐赠</a>
				</span>
                </p>
            </footer>
    </div>
</div>
<script src="/public/js/jquery.js"></script>
<script src="/public/js/plug-ins/customScrollbar.min.js"></script>
{{--<script src="/public/js/plug-ins/echarts.min.js"></script>--}}
<script src="/public/js/plug-ins/layerUi/layer.js"></script>
<script src="/public/layui/layui.js"></script>
<script src="/public/layui/layui.all.js"></script>
{{--<script src="editor/ueditor.config.js"></script>--}}
{{--<script src="editor/ueditor.all.js"></script>--}}
<script src="/public/js/plug-ins/pagination.js"></script>
<script src="/public/js/public.js"></script>
@section('js')
@show  {{--footer--}}
</body>
</html>

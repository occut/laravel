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
@endsection  {{--nav--}}
@section('main')
    <main class="main-cont content mCustomScrollbar">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{route("index.index")}}">首页</a><i class="icon-angle-right"></i></li>
                <li><a href="{{route("Administrators.index")}}">用户管理</a><i class="icon-angle-right"></i></li>
                <li><a href="#">添加管理员</a><i class="icon-angle-right"></i></li>
            </ul>
        </div>
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-bd">--}}
        {{--<fieldset class="field-title center">--}}
        {{--<legend>添加管理员</legend>--}}
        {{--</fieldset>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div style="margin:5px 0px">--}}
        {{--<button class="btn btn-secondary-outline"><a href="{{route("Administrators.create")}}">添加</a></button>--}}
        {{--</div>--}}
        <div class="page-wrap">
            <!--开始::内容-->
            <section class="page-hd">
                <header>
                    <h2 class="title">添加管理员</h2>
                    <p class="title-description">
                        两列式表单结构，一般针对产品详情，文章详情应用。
                    </p>
                </header>
                <hr>
            </section>
            <form action="{{route('AdminRole.store')}}" method="post">
                <div class="form-group-col-2">
                    <div class="form-label">角色名：</div>
                    <div class="form-cont">
                        <input type="text" name="rolename" placeholder="管理员名称..." class="form-control form-boxed" style="width:300px;">
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
            <!--开始::结束-->
        </div>
    </main>
@endsection  {{--nav--}}
@section('footer')
@endsection  {{--nav--}}
@section('js')
@endsection  {{--nav--}}
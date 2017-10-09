@extends('Admin.layouts.layout_admin')
@section('css')
@endsection  {{--css--}}
@section('nav')
@endsection  {{--nav--}}
@section('header')
@endsection
@section('main')
    <main class="main-cont content mCustomScrollbar">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{route("index.index")}}">首页</a><i class="icon-angle-right"></i></li>
                <li><a href="{{route("Administrators.index")}}">设置</a><i class="icon-angle-right"></i></li>
                <li><a href="#">个人信息</a><i class="icon-angle-right"></i></li>
            </ul>
        </div>

        <div class="page-wrap">
            <!--开始::内容-->
            <section class="page-hd">
                <header>
                    <h2 class="title">个人信息</h2>
                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {{Session::get('msg')}}
                        </div>
                    @endif
                </header>
                <hr>
            </section>
            <form action="{{route('Profile.store')}}" method="post">
                <div class="form-group-col-2">
                    <div class="form-label">用户名：</div>
                    <div class="form-cont">
                        <input type="text" name="username" value="{{$content->username}}" placeholder="管理员名称..." class="form-control form-boxed" style="width:300px;" readonly>
                        <input type="hidden" name="user_id" value="{{$content->user_id}}">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">用户密码：</div>
                    <div class="form-cont">
                        <input type="password" name="password" placeholder="为空不修改..." class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">手机号码：</div>
                    <div class="form-cont">
                        <input type="tel" name="phone" placeholder="手机号码..." value="{{$content->phone}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">电子邮箱：</div>
                    <div class="form-cont">
                        <input type="email" name="email" value="{{$content->email }}" placeholder="电子邮箱..." class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">性别：</div>
                    <div class="form-cont">
                        <label class="radio">
                            <input type="radio" name="gender" value="1" @if ($content->gender == 1) checked="checked" @endif/>
                            <span>男士</span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="gender" value="3"  @if ($content->gender == 3) checked="checked" @endif/>
                            <span>女士</span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="gender" value="2" @if ($content->gender == 2) checked="checked" @endif/>
                            <span>保密</span>
                        </label>
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">签名：</div>
                    <div class="form-cont">
                        <textarea class="form-control form-boxed" name="autograph" style="width: 300px">{{$content->autograph}}</textarea>
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label"></div>
                    <div class="form-cont">
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-primary" value="提交表单" />
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
    <script>
    </script>
@endsection  {{--nav--}}
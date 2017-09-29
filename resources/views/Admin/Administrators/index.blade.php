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
                    <li><a href="#">用户管理</a><i class="icon-angle-right"></i></li>
                </ul>
            </div>
            <div style="margin:5px 0px">
                <button class="btn btn-secondary-outline"><a href="{{route("Administrators.create")}}">添加</a></button>
            </div>
            <!--开始::内容-->
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>姓名</th>
                    <th>状态</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($content))
                    @foreach($content as $k=>$v)
                        <tr class="cen">
                            <td>{{$v->user_id}}</td>
                            <td><a href="#">{{$v->username}}</a></td>
                            <td>{{$v->ban}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>
                                <a title="编辑" class="mr-5">编辑</a>
                                <a title="权值" class="mr-5 " onclick='x_admin_show("权值","{{route("Administrators/weight",['id'=>$v['user_id']])}}")' >权值</a>
                                <a title="删除">删除</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </main>
        <div class="mask"></div>
        <div class="dialog" >
            <form action="{{route("Administrators/weight")}}" method="post">
            <div class="dialog-hd">
                <strong class="lt-title">角色权值</strong>
                <a class="rt-operate icon-remove JclosePanel" title="关闭"></a>
            </div>
            <div class="dialog-bd">
                <p>
                <div class="form-group-col-2">
                    <div class="form-label">角色：</div>
                    <div class="form-cont">
                    @if(isset($Admin_role))
                        @foreach($Admin_role as $k=>$v)
                                <label class="check-box">
                                    <input type="checkbox"  name="weight_id" value="{{$v->role_id}}"/>
                                    {{--checked="checked"--}}
                                    <span>{{$v->rolename}}</span>
                                </label>
                        @endforeach
                    @endif
                    </div>
                </div>
                    {{csrf_field()}}
                </p>
                <!--end::-->
            </div>
            <div class="dialog-ft">
                <button class="btn btn-info JyesBtn">确认</button>
            </div>
            </form>
            {{--<div class="dialog-ft">--}}
             {{--<button class="btn btn-secondary JnoBtn">关闭</button>--}}
             {{--</div>--}}
        </div>

    @endsection  {{--nav--}}
    @section('footer')
    @endsection  {{--nav--}}
    @section('js')
        <script type="text/javascript" src="/public/layui/layui.js"></script>
        <script>
            function x_admin_show(title,url,w,h){
                if (title == null || title == '') {
                    title=false;
                };
                if (url == null || url == '') {
                    url="404.html";
                };
                if (w == null || w == '') {
                    w=800+'px';
                };
                if (h == null || h == '') {
                    h=($(window).height() - 50)+'px';
                };
                layer.open({
                    type: 2,
                    area: [w, h],
                    fix: false, //不固定
                    maxmin: true,
                    shadeClose: true,
                    shade:0.4,
                    title: title,
                    content: url
                });
            }
        </script>
    @endsection  {{--nav--}}
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
            @if (Session::has('msg'))
                <div class="alert alert-success">
                    {{Session::get('msg')}}
                </div>
            @endif

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
                                <a title="编辑" class="mr-5" href="{{route("Administrators.edit",['id'=>$v['user_id']])}}">编辑</a>
                                {{--<a title="权值" class="mr-5 " onclick='x_admin_show("权值","{{route("Administrators/weight",['id'=>$v['user_id']])}}")' >权值</a>--}}
                                <a title="删除" href="{{route("Administrators.delete",['id'=>$v['user_id']])}}" onclick="DELETEall(this);return false;">删除</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </main>
    @endsection  {{--nav--}}
    @section('footer')
    @endsection  {{--nav--}}
    @section('js')
        <script type="text/javascript" src="/public/layui/layui.js"></script>
        <script>
            function DELETEall(node) {
                var url = node.href;
                var to = "{{csrf_token()}}";
                $.ajax({
                    url:url,
                    data: {'_token':to},
                    type:'DELETE',
                    success:function (result) {
                        //判断result结果
                        if (result.error){
                            $("#dialog").fadeIn();
                            $("#dialog h4").html(result.msg);
                            setTimeout(function () {
                                $("#dialog").fadeOut();
                            },1000);
                            window.location.reload();
                        }else{
                            $("#dialog").fadeOut();
                            $("#dialog h4").html(result.msg);
                            setTimeout(function () {
                                $("#dialog").fadeIn();
                            },2000);
                        }
                    }
                })
            };
        </script>
    @endsection  {{--nav--}}
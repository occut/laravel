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
    </header>
@endsection
@section('main')
    <main class="main-cont content mCustomScrollbar">
        <div class="page-wrap">
            <section class="page-hd" style="display: none">
                @if (Session::has('msg'))
                    <div class="alert alert-success" style="width: auto;padding: 10px;cursor: pointer">{{Session::get('msg')}}</div>
                    <p>{{Session::get('error')}}</p>
                @endif
            </section>
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li><a href="{{route('Area.index')}}" class="layui-this">所有区服</a></li>
                    <li><a href="{{route('Area.create')}}">添加区服</a></li>
                </ul>
                {{--所有区服Start--}}
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Area.index')}}" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="game_name">
                                            <option value="0">请选择所属游戏</option>
                                            @foreach($game as $g)
                                                <option value="{{$g->game_id}}">{{$g->game_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="recommend">
                                            <option value="0">请选择状态</option>
                                            <option value="1">推荐</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="stop">
                                            <option value="0">请选择是否停服</option>
                                            <option value="1">停服</option>
                                            <option value="2">不停服</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="area_name" placeholder="请输入区服名称..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="form-cont">
                                        <div class="layui-input-inline">
                                            {{csrf_field()}}
                                            <input type="submit" class="layui-btn" value="搜索" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Area.delete",['id'=>'yes'])}}','{{csrf_token()}}','确认要修改吗')">推荐</button>
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Area.delete",['id'=>'no'])}}','{{csrf_token()}}','确认要修改吗')">不推荐</button>
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Area.delete",['id'=>0])}}','{{csrf_token()}}','确认要停服吗')">停服</button>
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Area.delete",['id'=>1])}}','{{csrf_token()}}','确认要关闭吗')">不停服</button>
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Area.delete",['id'=>'all'])}}','{{csrf_token()}}')">删除</button>
                        </div>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="dcheckboxAll">
                                </th>
                                <th>ID</th>
                                <th>游戏名称</th>
                                <th>区服名称</th>
                                <th>推荐</th>
                                <th>是否停服	</th>
                                <th>开服时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!empty($content))
                                    @foreach($content as $con)
                                <tr>
                                    <td>
                                        <input type="checkbox" value="{{$con->area_id}}" name="dcheckbox">
                                    </td>
                                    <td>{{$con->area_id}}</td>
                                    <td>
                                        @foreach($game as $g)
                                            @if($con->game_name==$g->game_id){{$g->game_name}}@endif
                                        @endforeach
                                    </td>
                                    <td>{{$con->area_name}}</td>
                                    <td>
                                        @if($con->recommend==0)不推荐 @else 推荐 @endif
                                    </td>
                                    <td>
                                        @if($con->stop==0)停服 @else 不停服 @endif
                                    </td>
                                    <td>{{$con->time}}</td>
                                    <td>
                                        <a href="{{route('Area.edit',['area_id'=>$con->area_id])}}">编辑</a>
                                        <a href="{{route('Area.delete',['id'=>$con->area_id])}}" onclick="deletes(this,'{{csrf_token()}}');return false;">删除</a>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{--分页Start--}}
                        共{{$total}}条
                        @if(!empty($content))
                            {{$content->links("pagination.default")}}
                        @endif
                        {{--分页Over--}}
                    </div>
                    {{--所有区服Over--}}
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
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
            <!--开始::内容-->
            <section class="page-hd" style="display: none">
                @if (Session::has('msg'))
                    <div class="alert alert-success" style="width: auto;padding: 10px;cursor: pointer">{{Session::get('msg')}}</div>
                @endif
            </section>
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li><a href="{{route('Activity.index')}}" class="layui-this">所有活动</a></li>
                    <li><a href="{{route('Activity.create')}}">添加活动</a></li>
                </ul>
                {{--所有活动Start--}}
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Activity.search')}}" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="act_id" lay-verify="">
                                            <option value="">请选择活动类型</option>
                                            @foreach($types as $type)
                                            <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="act_name" placeholder="请输入活动名称..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="form-cont">
                                        <div class="layui-input-inline">
                                            {{csrf_field()}}
                                            <input type="submit" class="layui-btn" value="搜索" lay-filter="search"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Activity.delete",['id'=>'all'])}}','{{csrf_token()}}')">删除</button>
                        </div>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th  style="text-align: center">
                                    <input type="checkbox" id="dcheckboxAll">
                                </th>
                                <th>ID</th>
                                <th>活动名称</th>
                                <th>活动类型</th>
                                <th>参加人数</th>
                                <th>奖品</th>
                                <th>状态</th>
                                <th>活动开始时间</th>
                                <th>活动结束时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($page as $vo)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{$vo->act_id}}" name="dcheckbox">
                                </td>
                                <td>{{$vo->act_id}}</td>
                                <td>{{$vo->act_name}}</td>
                                <td>@if($vo->act_type==1)开服活动 @elseif($vo->act_type==2)节日活动 @else其他@endif</td>
                                <td>{{$vo->act_num}}</td>
                                <td>{{$vo->act_prize}}</td>
                                <td>
                                    <a href="javascript:void (0)" onclick="changeStatus(this,{{$vo->act_id}},'{{route("Activity.isOn")}}','{{csrf_token()}}')" style="color: @if($vo->status == 0)red @else #19A094 @endif"  num="{{$vo->status}}">
                                        @if($vo->status == 0)已关闭 @else 已开启 @endif
                                    </a>
                                </td>
                                <td>{{$vo->start_time}}</td>
                                <td>{{$vo->end_time}}</td>
                                <td>
                                    <a href="{{route('Activity.edit',['act_id'=>$vo->act_id])}}">编辑</a>
                                    <a href="{{route('Activity.delete',['act_id'=>$vo->act_id])}}" onclick="deletes(this,'{{csrf_token()}}');return false;">删除</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--分页Start--}}
                        共{{$total}}条
                        @if(!empty($page))
                            {{$page->links("pagination.default")}}
                        @endif
                        {{--分页Over--}}
                    </div>
                    {{--所有活动Over--}}
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
    </script>
@endsection  {{--nav--}}
@extends('Admin.layouts.layout_admin')
@section('css')
@endsection  {{--css--}}
@section('nav')
@endsection  {{--nav--}}
@section('header')
@endsection
@section('main')
    <main class="main-cont content mCustomScrollbar">
        <div class="page-wrap">
            <!--开始::内容-->
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li><a href="{{route('JieSuan.index')}}" class="layui-this">所有一级推广</a></li>
                    <li><a href="{{route('JieSuan.create')}}">结算期数</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('JieSuan.index')}}"  class="layui-form">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="pr_id" value="{{App\Functions\LogAction::input('pr_id')}}" placeholder="请输入推广ID..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="pr_name" value="{{App\Functions\LogAction::input('pr_name')}}" placeholder="请输入推广用户..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="pr_state" lay-verify="">
                                            <option value="0">请选择状态</option>
                                            <option value="1" {{'1' == App\Functions\LogAction::input('pr_state') ? 'selected' : ''}}>正常</option>
                                            <option value="2" {{'2' == App\Functions\LogAction::input('pr_state') ? 'selected' : ''}}>关闭</option>
                                        </select>
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
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("JieSuan.delete",['id'=>'all'])}}','{{csrf_token()}}')">删除</button>
                        </div>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th  style="text-align: center">
                                    <input type="checkbox" id="dcheckboxAll">
                                </th>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>状态</th>
                                <th>所属专员	</th>
                                <th>联系方式	</th>
                                <th>最后登陆时间	</th>
                                <th>账户余额	</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($content))
                                @foreach($content as $k=>$v)
                                    <tr class="cen">
                                        <td>
                                            <input type="checkbox" id="{{$v->pr_id}}" value="{{$v->pr_id}}" name="dcheckbox">
                                        </td>
                                        <td>{{$v->pr_id}}</td>
                                        <td><a href="#">{{$v->pr_name}}</a></td>
                                        <td><a href="{{route("Promoter.show",['id'=>$v['pr_id']])}}">{{$v->pr_state == \App\Model\Promoter::BAN_NO ? '正常' : '禁止'}}</a></td>
                                        <td>{{\App\Model\AdminUser::Adminselect($v->fid)['username']}}</td>
                                        <td>{{$v->pr_phone}}</td>
                                        <td>{{$v->created_at}}</td>
                                        <td>{{$v->pr_gold}}</td>
                                        <td>
                                            <a href="{{route("JieSuan.edit",['id'=>$v['pr_id']])}}">编辑</a>
                                            <a title="删除" href="{{route("JieSuan.delete",['id'=>$v['pr_id']])}}" onclick="deletes(this,'{{csrf_token()}}');return false;">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            {{--<tr>--}}
                                {{--<td>--}}
                                    {{--<input type="checkbox">--}}
                                {{--</td>--}}
                                {{--<td>1</td>--}}
                                {{--<td>用户名</td>--}}
                                {{--<td>状态</td>--}}
                                {{--<td>所属专员	</td>--}}
                                {{--<td>联系方式	</td>--}}
                                {{--<td>最后登陆时间	</td>--}}
                                {{--<td>账户余额	</td>--}}
                                {{--<td>--}}
                                    {{--<a href="#">编辑</a>--}}
                                    {{--<a href="#">删除</a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            </tbody>
                        </table>
                        {{--分页Start--}}
                        @if(!empty($content))
                            {{ $content->links("pagination.default") }}
                        @endif
                        {{--分页Over--}}
                    </div>
                    {{--所有账户Over--}}
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
                elem: '#startTime' //指定元素
            });
            laydate.render({
                elem: '#endTime' //指定元素
            });
        });
        //        时间选择Over
    </script>
@endsection  {{--nav--}}
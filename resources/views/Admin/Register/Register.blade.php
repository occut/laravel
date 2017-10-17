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
                    <li><a href="{{route('Register.index')}}" class="layui-this">实时注册</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Register.index')}}"  class="layui-form">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="ac_name" value="{{App\Functions\LogAction::input('ac_name')}}" placeholder="请输入用户名..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="ac_ip" value="{{App\Functions\LogAction::input('ac_ip')}}" placeholder="请输入注册IP..." class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="ac_type" lay-verify="">
                                            <option value="">请选择设备类型</option>
                                            <option value="0" {{'0' == App\Functions\LogAction::input('ac_type') ? 'selected' : ''}}>PC</option>
                                            <option value="1" {{'1' == App\Functions\LogAction::input('ac_type') ? 'selected' : ''}}>安卓</option>
                                            <option value="2" {{'2' == App\Functions\LogAction::input('ac_type') ? 'selected' : ''}}>苹果</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="ac_adminuser" lay-verify="">
                                            <option value="">请选择所属专员</option>
                                            @if(isset($User))
                                                <?php
                                                $tmp = '';
                                                \App\ClassLib\Category::treeMap($User,function($v) use(&$tmp) {
                                                    $tmp .= '<option value="'.$v['user_id'].'">'.$v['username'].'</option>';
                                                });
                                                echo $tmp;
                                                ?>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="ac_promoters" lay-verify="">
                                            <option value="">请选择所属渠道</option>
                                           @foreach($promoters as $k=>$v)
                                                <option value="{{$v->pr_id}}" {{$v->pr_id == App\Functions\LogAction::input('ac_promoters') ? 'selected' : ''}}>{{$v->pr_name}}</option>
                                               @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--<div class="layui-inline">--}}
                                    {{--<div class="layui-input-inline" style="width: 200px;">--}}
                                        {{--<select name="city" lay-verify="">--}}
                                            {{--<option>请选择游戏</option>--}}
                                            {{--<option value="0">游戏</option>--}}
                                            {{--<option value="1">游戏</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" id="startTime" name="startTime" value="{{App\Functions\LogAction::input("startTime")}}" class="layui-input" id="test6" placeholder="开始时间" class="form-control form-boxed">
                                    </div>
                                    <div class="layui-form-mid">-</div>
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" id="endTime" name="endTime" value="{{App\Functions\LogAction::input("endTime")}}" placeholder="结束时间" class="form-control form-boxed">
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
                            <button class="layui-btn layui-btn-small" onclick="delAll('{{route("Register.delete",['id'=>'all'])}}','{{csrf_token()}}')">删除</button>
                        </div>
                        <section class="sec" style="display: none">
                            @if (Session::has('msg'))
                                <div class="al" style="width: auto;padding: 10px;cursor: pointer">{{Session::get('msg')}}</div>
                                <p>{{Session::get('error')}}</p>
                            @endif
                        </section>
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th  style="text-align: center">
                                    <input type="checkbox" id="dcheckboxAll">
                                </th>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>注册游戏</th>
                                <th>注册时间</th>
                                <th>注册IP</th>
                                <th>游戏角色</th>
                                <th>分区</th>
                                <th>设备编号</th>
                                <th>设备类型</th>
                                <th>等  级</th>
                                <th>推广人员</th>
                                <th>所属专员</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($content))
                                @foreach($content as $k=>$v)
                                    <tr class="cen">
                                        <td>
                                            <input type="checkbox" id="{{$v->ac_id}}" value="{{$v->ac_id}}" name="dcheckbox">
                                        </td>
                                        <td>{{$v->ac_id}}</td>
                                        <td><a href="#">{{$v->ac_name}}</a></td>
                                        <td>{{$v->ac_game}}</td>
                                        <td>{{$v->ac_time}}</td>
                                        <td>{{$v->ac_ip}}</td>
                                        <td>{{$v->ac_role}}</td>
                                        <td>{{$v->ac_partition}}</td>
                                        <td>{{$v->ac_number}}</td>
                                        <td>{{\App\Model\Promoter::types($v->ac_type)}}</td>
                                        <td>{{$v->ac_grade}}</td>
                                        <td>{{\App\Model\Promoter::account($v->ac_promoters)['pr_name']}}</td>
                                        <td>{{\App\Model\AdminUser::Adminselect($v->ac_adminuser)['username']}}</td>
                                        <td>
                                            <a href="{{route("Register.edit",['id'=>$v->ac_id])}}">编辑</a>
                                            <a title="删除" href="{{route("Register.delete",['id'=>$v->ac_id])}}" onclick="deletes(this,'{{csrf_token()}}');return false;">删除</a>
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
                                {{--<td>注册游戏	</td>--}}
                                {{--<td>注册时间	</td>--}}
                                {{--<td>注册IP</td>--}}
                                {{--<td>游戏角色	</td>--}}
                                {{--<td>分区</td>--}}
                                {{--<td>设备编号	</td>--}}
                                {{--<td>设备类型	</td>--}}
                                {{--<td>等  级</td>--}}
                                {{--<td>推广人员	</td>--}}
                                {{--<td>所属专员	</td>--}}
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
                        <br>
                        <br>
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
            laydate.render({
                elem: '#test6'
                ,range: true
            });
        });
    </script>
@endsection  {{--nav--}}
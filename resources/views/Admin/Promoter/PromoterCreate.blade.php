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
                    <li><a href="{{route('Promoter.index')}}">所有推广用户</a></li>
                    <li><a href="{{route('Promoter.create')}}" class='layui-this'>添加推广用户</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--添加推广员Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Promoter.store')}}" method="post" class="layui-form">
                            <div class="form-group-col-2">
                                <div class="form-label">所属专员：</div>
                                <div class="form-cont" style="width: 300px">
                                    <select name="fid" required >
                                        <option value="0">请选择所属专员</option>
                                        @if(isset($res))
                                            <?php
                                            $tmp = '';
                                            \App\ClassLib\Category::treeMap($res,function($v) use(&$tmp) {
                                                $tmp .= '<option value="'.$v['user_id'].'">'.$v['username'].'</option>';
                                            });
                                            echo $tmp;
                                            ?>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">用户名：</div>
                                <div class="form-cont">
                                    <input type="text" name="pr_name" placeholder="请输入用户名..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">密码：</div>
                                <div class="form-cont">
                                    <input type="password" name="pr_password" placeholder="请输入密码..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">邮箱：</div>
                                <div class="form-cont">
                                    <input type="email" name="pr_mailbox" placeholder="请输入邮箱..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="pr_state" value="2" title="关闭">
                                    <input type="radio" name="pr_state" value="1" title="开启" checked>
                                </div>
                            </div>

                            <div class="form-group-col-2">
                                <div class="form-label">银行：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="pr_bank"  style="width: 300px" class="layui-input" placeholder="请填写银行..." required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">银行账号：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="pr_account"  style="width: 300px" class="layui-input" placeholder="请填写银行账号..." required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">手机号码：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="pr_phone"  style="width: 300px" class="layui-input" placeholder="请填写手机号..." required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">QQ：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="pr_qq"  style="width: 300px" class="layui-input" placeholder="请填写QQ...">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">QQ群：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="pr_group"  style="width: 300px" class="layui-input" placeholder="请填写QQ群..." >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">备注：</div>
                                <div class="layui-input-block">
                                    <textarea  name="pr_remarks" style="width: 300px" required ></textarea>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label"></div>
                                <div class="form-cont">
                                    {{csrf_field()}}
                                    <input type="submit" class="btn btn-primary" value="提交表单"/>
                                    <input type="reset" class="btn btn-disabled" value="禁止" />
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--所有推广员Over--}}
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

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="/public/admin/login/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/public/admin/login/css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="/public/admin/login/css/component.css" />
    <!--[if IE]>
    <script src="/public/admin/login/js/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css" />
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                {{--<h3>欢迎你</h3>--}}
                <form class="layui-form layui-form-pane" action="{{route("login.store")}}" method="post" style="background-color:transparent ">
                    <div class="layui-form-item">
                        <h3 style="margin:auto;">
                            <span style="color:#ffffff;">网站后台管理系统</span><br />
                            <span class="version"></span>
                        </h3>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;color:#000000;">
                            用户名：</label>
                        <div class="layui-input-inline">
                            <input type="text" name="username" lay-verify="username" required lay-verify="required" autocomplete="off" class="layui-input" lay-verify="account" placeholder="请输入用户名" maxlength="20" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;" />
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;color:#000000;">
                            密码：</label>
                        <div class="layui-input-inline">
                            <input type="password" required lay-verify="required" name="password" class="layui-input" lay-verify="password" placeholder="请输入密码" maxlength="20" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;" />
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;color:#000000;">
                            验证码
                        </label>
                        {{--width: 76px;--}}
                        <div class="layui-input-inline" style="" >
                            <input type="text" name="captcha" id="captcha" placeholder="验证码" required lay-verify="required" autocomplete="off" class="layui-input" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
                        </div>

                    </div>
                    @if (count($errors) > 0)
                        <div class="layui-form-item" style="color: #DD4A68;">
                            <label class="layui-form-label"></label>
                            <div class="layui-input-inline">
                                @foreach ($errors->all() as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="layui-form-item" style="">
                        <a type="reset" class="layui-btn btn-reset layui-btn-danger" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
                            重置</a>
                        {{csrf_field()}}
                        <button  class="layui-btn btn-submit logSubmit" lay-submit lay-filter="signIn" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
                            立即登录</button>
                        {{--<div class="layui-input-inline" style="width: auto;margin: 0;" >--}}
                        <img style="height: 38px;width:100px;margin: 0 10px;display:none;" id="images" src="{{captcha_src()}}" alt="验证码" onclick="this.src='/captcha/default?a='+Math.random(0,10)">
                        {{--</div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script src="/public/admin/login/js/TweenLite.min.js"></script>
<script src="/public/admin/login/js/EasePack.min.js"></script>
<script src="/public/admin/login/js/rAF.js"></script>
<script src="/public/admin/login/js/demo-1.js"></script>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.js"></script>
<script type="text/javascript" src="/public/layui/layui.js"></script>
{{--<script type="text/javascript" src="/public/layui/layui.all.js"></script>--}}
{{--<script type="text/javascript" src="/public/admin/script.js"></script>--}}
<script src="/public/admin/admin.js"></script>
<script>
    //Demo
    layui.use(['form'], function(){
        var form = layui.form;
        form.verify({
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
                    return '用户名不能有特殊字符';
                }
                if(/(^\_)|(\__)|(\_+$)/.test(value)){
                    return '用户名首尾不能出现下划线\'_\'';
                }
                if(/^\d+\d+\d$/.test(value)){
                    return '用户名不能全为数字';
                }
            }
        });
        //监听提交
        form.on('submit(signIn)', function(data){
            var result = post(data.form.action,data.field);
            if(typeof result == 'object' && result.error){
                layer.msg(result.msg, { icon: 6 });
                layer.closeAll('page');
                setTimeout(function () {
                    location.href = result.url;
                }, 1000);
            }else{
                layer.msg(result.msg, { icon: 5 });
            }
            return false;
        });
    });

    $(document).ready(function(){
        $("#captcha").focusin(function(){
            $("#images").show();
        })
    });
    // .focusin
</script>
</body>
</html>
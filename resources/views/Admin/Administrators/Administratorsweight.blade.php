<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台管理系统-HTML5后台管理系统</title>
    <meta name="keywords"  content="设置关键词..." />
    <meta name="description" content="设置描述..." />
    <meta name="author" content="DeathGhost" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link rel="icon" href="/public/images/icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css" />
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/plug-ins/customScrollbar.min.js"></script>
    <script src="/public/js/plug-ins/layerUi/layer.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css" />
    <script src="/public/js/plug-ins/pagination.js"></script>
    <script src="/public/js/public.js"></script>
    <script src="/public/js/public.js"></script>
</head>
<body>

<form action="{{route("Administrators/weight")}}" class="layui-form" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">角色</label>
        <div class="layui-input-block">
            @if(isset($content))
                @foreach($content as $k=>$v)
                    <input type="radio" name="sex" value="{{$v->role_id}}" title="{{$v->rolename}}">
                @endforeach
            @endif
        </div>
    </div>
        {{csrf_field()}}
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script src="/public/layui/layui.js"></script>
<script src="/public/layui/layui.all.js"></script>
</body>
</html>
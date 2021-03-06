<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>{{$site->site_name}}</title>
    <meta name="keywords"  content="设置关键词..." />
    <meta name="description" content="设置描述..." />
    <meta name="author" content="DeathGhost" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link rel="icon" href="{{$site->site_logo}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/style.css" />
    @section('css')
    @show  {{--css--}}
</head>
<body>
<div class="main-wrap">
        <div class="side-nav">
            <div class="side-logo">
                <div class="logo">
				{{--<span class="logo-ico">--}}
				<span>
                    <img src="{{$site->site_logo}}" alt="{{$site->site_name}}" style="height: 15px;">
					{{--<i class="i-l-1"></i>--}}
					{{--<i class="i-l-2"></i>--}}
					{{--<i class="i-l-3"></i>--}}
				</span>
                    <strong>{{$site->site_name}}</strong>
                </div>
            </div>
            <nav class="side-menu content mCustomScrollbar" data-mcs-theme="minimal-dark">
                <h2>
                    <a href="{{route('index.index')}}" class="InitialPage"><i class="icon-dashboard"></i>首页</a>
                </h2>
                <ul class="tabchange">
                    @foreach($parent as $p)
                        <li id="li{{$p['node_id']}}">
                            <dl>
                                <dt s="1" onclick="sessionid({{$p['node_id']}})">
                                    <i class="layui-icon"  style="padding-right: 5px">{{$p['icon']}}</i>{{$p['nodename']}}<i class="icon-angle-right"></i>
                                </dt>
                               @if(isset($p['child']))
                                    @foreach($p['child'] as $k)
                                        <dd id="dd{{$k['node_id']}}" onclick="sessionidd({{$k['node_id']}})">
                                            <a href="{{route($k['url'])}}">{{$k['nodename']}}</a>
                                        </dd>
                                    @endforeach
                                @endif
                            </dl>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <footer class="side-footer">{{$site->site_copyright}}</footer>
        </div>
    @section('nav')
    @show  {{--nav--}}
    <div class="content-wrap">
        @section('header')
        @show  {{--header--}}
            <header class="top-hd">
                <div class="hd-lt">
                    <a class="icon-reorder"></a>
                </div>
                <div class="hd-rt">
                    <ul>
                        {{--<li>--}}
                            {{--<a href="#" target="_blank"><i class="icon-home"></i>前台访问</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{route("index.create")}}" onclick="Clearcache(this);return false;"><i class="icon-random"></i>清除缓存</a>
                        </li>
                        <li>
                            <a><i class="icon-user"></i>{{$adminnamerole['rolename']}}:<em>{{$adminnamerole['name']}}</em></a>
                        </li>
                        {{--<li>--}}
                            {{--<a><i class="icon-bell-alt"></i>系统消息</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="javascript:void(0)" id="JsSignOut"><i class="icon-signout"></i>安全退出</a>
                        </li>
                    </ul>
                </div>

            </header>
            <div id="dialog">
                <h4></h4>
            </div>

        @section('main')
                <main class="main-cont content mCustomScrollbar">
                    <ul class="indexUl">
                        <li>
                            <p>
                                <i class="layui-icon" style="font-size: 40px; color: #1E9FFF;vertical-align: middle">&#xe613;</i>
                                <span>
                                    <i>昨日注册人</i>
                                <i>0</i>
                                </span>

                            </p>
                            <p>
                                <i class="layui-icon" style="font-size: 40px; color: #1E9FFF;vertical-align: middle">&#xe613;</i>
                                <span>
                                    <i>今日注册人</i>
                                <i>0</i>
                                </span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="layui-icon" style="font-size: 40px; color: #FF7F50;vertical-align: middle">&#xe62c;</i>
                                <span>
                                    <i>昨日总流水</i>
                                <i>0</i>
                                </span>

                            </p>
                            <p>
                                <i class="layui-icon" style="font-size: 40px; color: #FF7F50;vertical-align: middle">&#xe62c;</i>
                                <span>
                                    <i>今日总流水</i>
                                <i>0</i>
                                </span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="layui-icon" style="font-size: 40px; color: #ED5565;vertical-align: middle">&#xe612;</i>
                                <span>
                                    <i>昨日付费人</i>
                                <i>0</i>
                                </span>

                            </p>
                            <p>
                                <i class="layui-icon" style="font-size: 40px; color: #ED5565;vertical-align: middle">&#xe612;</i>
                                <span>
                                    <i>今日付费人</i>
                                <i>0</i>
                                </span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="layui-icon" style="font-size: 40px; color: #F4A425;vertical-align: middle">&#xe629;</i>
                                <span>
                                    <i>昨日付费率</i>
                                <i>0</i>
                                </span>

                            </p>
                            <p>
                                <i class="layui-icon" style="font-size: 40px; color: #F4A425;vertical-align: middle">&#xe629;</i>
                                <span>
                                    <i>今日付费率</i>
                                <i>0</i>
                                </span>
                            </p>
                        </li>
                    </ul>
                    <div id="chart-containerHome" style="margin-left:170px;">FusionCharts will render here</div>
                </main>
        @show  {{--main--}}
        @section('footer')
        @show  {{--footer--}}
            <footer class="btm-ft">
                <p class="clear">
                    <span class="fl">{{$site->site_copyright}}<a href="#" title="DeathGhost" target="_blank">{{$site->site_domainname}}</a></span>
                    <span class="fr text-info">
					<em class="uppercase">
						<i class="icon-user"></i>
                        {{$site->site_name}}
					</em> |
                        {{$site->site_filinginformation}}
				</span>
                </p>
            </footer>
    </div>
</div>
<script src="/public/js/jquery.js"></script>
<script src="/public/js/plug-ins/customScrollbar.min.js"></script>
<script src="/public/js/plug-ins/layerUi/layer.js"></script>
<script src="/public/layui/layui.js"></script>
<script src="/public/layui/layui.all.js"></script>
<script src="/public/js/plug-ins/pagination.js"></script>
<script src="/public/js/public.js"></script>
<script src="/public/js/fusioncharts.js"></script>

<script src="/public/admin/admin.js"></script>
{{--<script src="/public/admin/js.js"></script>--}}
<script src="/public/admin/js.js"></script>
<script src="/public/common/jquerysession.js"></script>
<script>
    var a = $.session.get('key');
    var b = "#li"+a;
    var c = $.session.get('keys');
    var d = "#dd"+c;
    console.log(b);
    console.log(d);
    function sessionid(id){
        $.session.set('key', id);
    }
    function sessionidd(id){
        $.session.set('keys', id);
    }
    $(b).addClass("open");
    $(d).css("background","#2d363f");
    $(".tabchange li dd").click(function () {
        var name=$(this).find("a").html();
        var to = "{{csrf_token()}}"
        $.ajax({
            url:"{('Index/getName')}",
            type:"post",
            data:{'_token': to,"name":name},
            dataType:"json",
            async:false,
            success:function (result) {
                alert(result);
            }
        });
    });
    function Clearcache(obj) {
        layer.confirm('确定要清除缓存么吗？', {
            btn: ['确定', '我在想想'] //可以无限个按钮
            ,yes: function(index, layero){
                var url = obj.href;
                var to = "{{csrf_token()}}";
                $.ajax({
                    url:url,
                    data: {},
                    type:'get',
                    success:function (result) {
                        //判断result结果
                        if (result.error){
                            layer.msg(result.msg, {icon: 6});
                            window.location.reload();
                        }else{
                            layer.msg(result.msg, {icon: 5});
                        }
                    }
                })
            }
        }, function(index){
            return false;
        });
    }
    //        提示框Start
    if($(".sec .al").text()!=""){
        if ($(".sec p").text()==1 || $(".sec .al").text()==0){
            layer.msg($(".sec .al").text(), {icon: 6});
        }else{
            layer.msg($(".sec .al").text(), {icon: 5});
        }
    }
    //        提示框Over

//    排序Start

//    排序Over
</script>
@section('js')
    <script src="/public/js/charts.js"></script>
@show  {{--footer--}}
</body>
</html>

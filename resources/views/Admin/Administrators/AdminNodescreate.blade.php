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
                <li><a href="{{route("Administrators.index")}}">用户管理</a><i class="icon-angle-right"></i></li>
                <li><a href="#">添加管理员</a><i class="icon-angle-right"></i></li>
            </ul>
        </div>
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-bd">--}}
        {{--<fieldset class="field-title center">--}}
        {{--<legend>添加管理员</legend>--}}
        {{--</fieldset>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div style="margin:5px 0px">--}}
        {{--<button class="btn btn-secondary-outline"><a href="{{route("Administrators.create")}}">添加</a></button>--}}
        {{--</div>--}}
        <div class="page-wrap">
            <!--开始::内容-->
            <section class="page-hd">
                <header>
                    <h2 class="title">添加管理员</h2>
                    <p class="title-description">
                        两列式表单结构，一般针对产品详情，文章详情应用。
                    </p>
                </header>
                <hr>
            </section>
            <form action="{{route('Administrators.store')}}" method="post">
                <div class="form-group-col-2">
                    <div class="form-label">用户名：</div>
                    <div class="form-cont">
                        <input type="text" name="username" placeholder="管理员名称..." class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">用户密码：</div>
                    <div class="form-cont">
                        <input type="password" name="password" placeholder="用户密码..." class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">手机号码：</div>
                    <div class="form-cont">
                        <input type="tel" name="phone" placeholder="手机号码..." class="form-control form-boxed" style="width:300px;">
                        {{--<button class="btn btn-secondary-outline">测试</button>--}}
                        {{--<span class="word-aux"><i class="icon-warning-sign"></i>清正确输入11位手机号码</span>--}}
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">电子邮箱：</div>
                    <div class="form-cont">
                        <input type="email" name="email" placeholder="电子邮箱..." class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">性别：</div>
                    <div class="form-cont">
                        <label class="radio">
                            <input type="radio" name="sex" value="1"/>
                            <span>男士</span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="sex" value="0"  checked="checked"/>
                            <span>女士</span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="sex" value="2"/>
                            <span>保密</span>
                        </label>
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">签名：</div>
                    <div class="form-cont">
                        <textarea class="form-control form-boxed" name="autograph">签名</textarea>
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label"></div>
                    <div class="form-cont">
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-primary" value="提交表单" />
                        <input type="reset" class="btn btn-disabled" value="禁止" />
                    </div>
                </div>
            </form>
            <!--开始::结束-->
        </div>
    </main>
@endsection  {{--nav--}}
@section('footer')
@endsection  {{--nav--}}
@section('js')
    <script>
        //分页
        $(".pagination").createPage({
            pageCount:5,
            current:1,
            backFn:function(p){
                console.log(p);
            }
        });
        //demo1
        var dom = document.getElementById("demo1");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
        function randomData() {
            now = new Date(+now + oneDay);
            value = value + Math.random() * 21 - 10;
            return {
                name: now.toString(),
                value: [
                    [now.getFullYear(), now.getMonth() + 1, now.getDate()].join('/'),
                    Math.round(value)
                ]
            }
        }

        var data = [];
        var now = +new Date(1997, 9, 3);
        var oneDay = 24 * 3600 * 1000;
        var value = Math.random() * 1000;
        for (var i = 0; i < 1000; i++) {
            data.push(randomData());
        }

        option = {
            tooltip: {
                trigger: 'axis',
                formatter: function (params) {
                    params = params[0];
                    var date = new Date(params.name);
                    return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear() + ' : ' + params.value[1];
                },
                axisPointer: {
                    animation: false
                }
            },
            xAxis: {
                type: 'time',
                splitLine: {
                    show: false
                }
            },
            yAxis: {
                type: 'value',
                boundaryGap: [0, '100%'],
                splitLine: {
                    show: false
                }
            },
            series: [{
                name: '模拟数据',
                type: 'line',
                showSymbol: false,
                hoverAnimation: false,
                data: data
            }]
        };

        setInterval(function () {

            for (var i = 0; i < 5; i++) {
                data.shift();
                data.push(randomData());
            }

            myChart.setOption({
                series: [{
                    data: data
                }]
            });
        }, 1000);;
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }

        //demo2
        var dom = document.getElementById("demo2");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
        option = {
            tooltip: {
                trigger: 'axis'
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['周一','周二','周三','周四','周五','周六','周日']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'邮件营销',
                    type:'line',
                    stack: '总量',
                    data:[120, 132, 101, 134, 90, 230, 210]
                },
                {
                    name:'联盟广告',
                    type:'line',
                    stack: '总量',
                    data:[220, 182, 191, 234, 290, 330, 310]
                },
                {
                    name:'视频广告',
                    type:'line',
                    stack: '总量',
                    data:[150, 232, 201, 154, 190, 330, 410]
                },
                {
                    name:'直接访问',
                    type:'line',
                    stack: '总量',
                    data:[320, 332, 301, 334, 390, 330, 320]
                },
                {
                    name:'搜索引擎',
                    type:'line',
                    stack: '总量',
                    data:[820, 932, 901, 934, 1290, 1330, 1320]
                }
            ]
        };
        ;
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }
    </script>
@endsection  {{--nav--}}
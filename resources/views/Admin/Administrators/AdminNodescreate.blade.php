@extends('Admin.layouts.layout_admin')
@section('css')
@endsection  {{--css--}}
@section('nav')
@endsection  {{--nav--}}
@section('header')
@endsection  {{--nav--}}
@section('main')
    <main class="main-cont content mCustomScrollbar">
        {{--<div class="breadcrumb">--}}
            {{--<ul>--}}
                {{--<li><a href="{{route("index.index")}}">首页</a><i class="icon-angle-right"></i></li>--}}
                {{--<li><a href="{{route("AdminNodes.index")}}">节点管理</a><i class="icon-angle-right"></i></li>--}}
                {{--<li><a href="#">添加节点</a><i class="icon-angle-right"></i></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        @if (Session::has('msg'))
            <div class="alert alert-success">
                {{Session::get('msg')}}
            </div>
        @endif
        <div class="page-wrap">
            <!--开始::内容-->
            <section class="page-hd">
                <header>
                    <h2 class="title">添加节点</h2>
                    <p class="title-description">
                        {{--两列式表单结构，一般针对产品详情，文章详情应用。--}}
                    </p>
                </header>
                <hr>
            </section>
            <form action="{{route('AdminNodes.store')}}" method="post">
                @if(!empty($content))
                    <div class="form-group-col-2">
                        <div class="form-label">父级节点：</div>
                        <div class="form-cont">
                            <input type="text" name="fname" readonly value="{{$content->nodename}}" placeholder="管理员名称..." class="form-control form-boxed" style="width:300px;">
                            <input type="hidden" name="fid" value="{{$content->node_id}}">
                        </div>
                    </div>
                @endif
                <div class="form-group-col-2">
                    <div class="form-label">节点名：</div>
                    <div class="form-cont">
                        <input type="text" name="nodename" placeholder="管理员名称..." class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                    <div class="form-group-col-2">
                        <div class="form-label">权值：</div>
                        <div class="form-cont">
                            <input type="text" name="auth" placeholder="请输入权值..." class="form-control form-boxed" style="width:300px;">
                        </div>
                        <span class="word-aux"><i class="icon-warning-sign"></i> 例如：App\Http\Controllers\Admin\Rbac\NodeController<?php echo '@';?>index</span>
                    </div>
                    <div class="form-group-col-2">
                        <div class="form-label">链接：</div>
                        <div class="form-cont">
                            <input type="text" name="url" placeholder="请输入链接..." class="form-control form-boxed" style="width:300px;">
                        </div>
                    </div>
                <div class="form-group-col-2">
                    <div class="form-label"></div>
                    <div class="form-cont">
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-primary" value="提交表单" />
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
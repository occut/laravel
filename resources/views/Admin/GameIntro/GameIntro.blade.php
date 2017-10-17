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
                    <li class="layui-this">游戏概况</li>
                </ul>
                {{--所有活动Start--}}
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <form action="" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="start_time" id="starttime" placeholder="开始时间" class="form-control form-boxed">
                                    </div>
                                    <div class="layui-form-mid">-</div>
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <input type="text" name="end_time" id="endtime" placeholder="结束时间" class="form-control form-boxed">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline" style="width: 200px;">
                                        <select name="city" lay-verify="">
                                            <option>全站概况</option>
                                            <option value="0">反恐精英</option>
                                            <option value="1">王者荣耀</option>
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
                        <div class="layui-block">
                               <span style="float: left;width: auto;text-align: center;margin: 0 10px;">
                                   <span class="layui-icon" style="font-size: 40px; color: #1E9FFF;float: left">&#xe629;</span>
                                   <span style="float: left;margin-top: 12px;margin-left: 5px">
                                       <p>设备激活</p>
                                        <p>0</p>
                                   </span>

                               </span>
                               <span style="float: left;width: auto;text-align: center;margin: 0 10px">
                                   <span class="layui-icon" style="font-size: 40px; color: #92CCA3;float: left">&#xe612;</span>
                                   <span style="float: left;margin-top: 12px;margin-left: 5px">
                                       <p>新增玩家</p>
                                       <p>0</p>
                                   </span>
                               </span>
                               <span style="float: left;width: auto;text-align: center;margin: 0 10px">
                                   <span class="layui-icon" style="font-size: 40px; color: #8EC5E3;float: left">&#xe698;</span>
                                  <span style="float: left;margin-top: 12px;margin-left: 5px">
                                   <p>付费玩家</p>
                                   <p>0</p>
                                  </span>
                               </span>
                            <span style="float: left;width: auto;text-align: center;margin: 0 10px;">
                                   <span class="layui-icon" style="font-size: 40px; color: #DDAB24;float: left">&#xe65e;</span>
                                <span style="float: left;margin-top: 12px;margin-left: 5px">
                                   <p>玩家收入</p>
                                   <p>0</p>
                                </span>
                            </span>
                            <span style="float: left;width: auto;text-align: center;margin: 0 10px;">
                                   <span class="layui-icon" style="font-size: 40px; color: #DDAB24;float: left">&#xe65e;</span>
                                <span style="float: left;margin-top: 12px;margin-left: 5px">
                                   <p>不参与分成金额</p>
                                   <p>0.00</p>
                                </span>
                            </span>
                            <div style="clear: both"></div>
                        </div>
                        {{--关键指标Start--}}
                        <div  style="height: 40px;background-color:#D7DDE4;color: #4F5F6F;margin-top: 30px;line-height: 40px;font-size: 18px;font-family: '楷体'">关键指标</div>
                        <div class="layui-tab layui-tab-card">
                            <ul class="layui-tab-title">
                                <li class="layui-this">新增激活和账号</li>
                                <li>活跃玩家</li>
                                <li>付费玩家</li>
                                <li>收入</li>
                            </ul>
                            <div class="layui-tab-content">
                                <div class="layui-tab-item layui-show">
                                    <div id="chart-container">FusionCharts will render here</div>
                                </div>
                                <div class="layui-tab-item">
                                    <div id="chart-container2">FusionCharts will render here</div>
                                </div>
                                <div class="layui-tab-item">
                                    <div id="chart-container3">FusionCharts will render here</div>
                                </div>
                                <div class="layui-tab-item">
                                    <div id="chart-container4">FusionCharts will render here</div>
                                </div>
                            </div>
                        </div>
                        {{--关键指标Over--}}
                        {{--付费渗透Start--}}
                        <div  style="height: 40px;background-color:#D7DDE4;color: #4F5F6F;margin-top: 30px;line-height: 40px;font-size: 18px;font-family: '楷体'">付费渗透</div>
                        <div class="layui-tab layui-tab-card">
                            <ul class="layui-tab-title">
                                <li class="layui-this">日付费率</li>
                                <li>日ARPU</li>
                                <li>日ARPPU</li>
                            </ul>
                            <div class="layui-tab-content">
                                <div class="layui-tab-item layui-show">
                                    <div id="chart-container5">FusionCharts will render here</div>
                                </div>
                                <div class="layui-tab-item">
                                    <div id="chart-container6">FusionCharts will render here</div>
                                </div>
                                <div class="layui-tab-item">
                                    <div id="chart-container7">FusionCharts will render here</div>
                                </div>
                            </div>
                        </div>
                        {{--付费渗透Over--}}
                        {{--玩家留存Start--}}
                        <div  style="height: 40px;background-color:#D7DDE4;color: #4F5F6F;margin-top: 30px;line-height: 40px;font-size: 18px;font-family: '楷体'">玩家留存</div>
                        <div class="layui-tab layui-tab-card">
                            <ul class="layui-tab-title">
                                <li class="layui-this">新增账户留存</li>
                                <li>激活设备留存</li>
                            </ul>
                            <div class="layui-tab-content">
                                <div class="layui-tab-item layui-show">
                                    <div id="chart-container8">FusionCharts will render here</div>
                                </div>
                                <div class="layui-tab-item">
                                    <div id="chart-container9">FusionCharts will render here</div>
                                </div>
                            </div>
                        </div>
                        {{--玩家留存Over--}}
                        {{--平均游戏时长与次数Start--}}
                        <div  style="height: 40px;background-color:#D7DDE4;color: #4F5F6F;margin-top: 30px;line-height: 40px;font-size: 18px;font-family: '楷体'">平均游戏时长与次数</div>
                        <div class="layui-tab layui-tab-card">
                            {{--<ul class="layui-tab-title">--}}
                                {{--<li class="layui-this">新增账户留存</li>--}}
                                {{--<li>激活设备留存</li>--}}
                            {{--</ul>--}}
                            <div class="layui-tab-content">
                                <div class="layui-tab-item layui-show">
                                    <div id="chart-container10">FusionCharts will render here</div>
                                </div>
                            </div>
                        </div>
                        {{--平均游戏时长与次数Over--}}
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
        function deletes(obj) {
            layer.confirm('确定要删除吗？', {
                btn: ['确定', '取消'] //可以无限个按钮
                ,yes: function(index, layero){
                    var url = obj.href;
                    $.ajax({
                        url:url,
                        data: {'_token':"{{csrf_token()}}"},
                        type:'DELETE',
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
        {{--点击图片上传图片Start--}}
        function imgClick() {
            document.getElementById("fileToUpload").click();
        }
        {{--点击图片上传图片Over--}}
        //        分页Start
        $(".pagination").createPage({
            pageCount:10,
            current:1,
            backFn:function(p){
                console.log(p);
            }
        });
        //        分页Over
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
        //        富文本编辑器Start
        layui.use('layedit', function(){
            var layedit = layui.layedit;
            layedit.build('editor'); //建立编辑器
        });
        //        富文本编辑器Over
        //        提示框Start
        if($(".page-hd .alert").text()!=""){
            layer.msg($(".page-hd .alert").text());
        }
        //        提示框Over
    </script>
    <script src="/public/js/charts.js"></script>
@endsection  {{--nav--}}
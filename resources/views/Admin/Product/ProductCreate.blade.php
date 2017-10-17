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
                    <li><a href="{{route('Product.index')}}">所有商品排行</a></li>
                    <li><a href="{{route('Product.create')}}" class="layui-this">添加商品</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--所有账户Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Activity.store')}}" method="post" class="layui-form">
                            <div class="form-group-col-2">
                                <div class="form-label">商品类型：</div>
                                <div class="form-cont" style="width: 300px">
                                    <select name="activity_types" required >
                                        <option>请选择商品类型</option>
                                        <option>虚拟商品</option>
                                        <option>实物商品</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">商品名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="activity_name" placeholder="请输入商品名称..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="form-cont">
                                    <input type="radio" name="status" value="0" title="上架" checked>
                                    <input type="radio" name="status" value="1" title="下架">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">是否推荐：</div>
                                <div class="form-cont">
                                    <input type="radio" name="recommend" value="0" title="推荐" checked>
                                    <input type="radio" name="recommend" value="1" title="不推荐">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">开始时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="start_time" class="layui-input" id="starttime" style="width: 300px" placeholder="开始时间..." required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">结束时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" name="end_time" class="layui-input" id="endtime" style="width: 300px" placeholder="结束时间..." required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">库存数量：</div>
                                <div class="form-cont">
                                    <input type="text" name="percentage" placeholder="库存数量..." class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">兑换数量：</div>
                                <div class="form-cont">
                                    <input type="text" name="keyword" placeholder="0" class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">兑换所需积分：</div>
                                <div class="form-cont">
                                    <input type="text" name="website" placeholder="兑换所需积分（需大于0）" class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">兑换所需原积分：</div>
                                <div class="form-cont">
                                    <input type="text" name="bbs" placeholder="兑换所需原积分（需大于0）" style="width: 300px" required class="form-control form-boxed">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">点击数：</div>
                                <div class="form-cont">
                                    <input type="text" name="coin" placeholder="0" class="form-control form-boxed" style="width: 300px" required >
                                </div>
                            </div>

                            <div class="form-group-col-2">
                                <div class="form-label">卡号：</div>
                                <div class="form-cont">
                                    <textarea type="text" name="keyword" placeholder="" class="form-control form-boxed" style="width: 300px" required ></textarea>
                                    <i>若是虚拟商品添加</i>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">商品内容：</div>
                                <div class="form-cont">
                                    <textarea type="text" name="keyword" placeholder="" class="form-control form-boxed" style="width: 300px" required ></textarea>
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
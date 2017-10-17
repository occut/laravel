@extends('Admin.layouts.layout_admin')
@section('css')
@endsection  css
@section('nav')
@endsection  nav
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
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li><a href="{{route('Area.index')}}">所有区服</a></li>
                    <li><a href="javascript:void(0)" class="layui-this">编辑区服</a></li>
                </ul>
                <div class="layui-tab-content">
                    {{--添加区服Start--}}
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Area.update',['area_id'=>$result->area_id])}}" method="post" class="layui-form">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="area_id" value="{{$result->area_id}}">
                            <div class="form-group-col-2">
                                <div class="form-label">游戏名称：</div>
                                <div class="layui-input-inline" style="width: 300px;">
                                    <select name="game_name">
                                        @foreach($game as $g)
                                            <option value="{{$g->game_id}}" @if($result->game_name==$g->game_id) selected @endif>{{$g->game_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">开服名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="area_name" placeholder="开服名称..." class="form-control form-boxed" style="width:300px;"lay-verify="required" value="{{$result->area_name}}">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">区服：</div>
                                <div class="form-cont">
                                    <input type="number" name="area_num" placeholder="请填写数字..." class="form-control form-boxed" style="width:300px;" lay-verify="required" min="0" value="{{$result->area_num}}">
                                    <i>*默认情况不需要修改</i>
                                </div>

                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="recommend" value="1" title="推荐" @if($result->recommend==1) checked @endif>
                                    <input type="radio" name="recommend" value="0" title="不推荐" @if($result->recommend==0) checked @endif>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">设备：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="phone" value="0" title="安卓" @if($result->phone==0) checked @endif>
                                    <input type="radio" name="phone" value="1" title="苹果" @if($result->phone==1) checked @endif>
                                    <input type="radio" name="phone" value="2" title="混服" @if($result->phone==2) checked @endif>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">是否显示：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="showOrnot" value="1" title="显示"  @if($result->phone==1) checked @endif>
                                    <input type="radio" name="showOrnot" value="0" title="不显示"  @if($result->phone==0) checked @endif>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">是否停服：</div>
                                <div class="layui-input-block">
                                    <input type="radio" name="stop" value="0" title="停服"  @if($result->phone==0) checked @endif>
                                    <input type="radio" name="stop" value="1" title="不停服"  @if($result->phone==1) checked @endif>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">开服时间：</div>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" name="time" id="time" style="width: 300px" placeholder="开服时间..." value="{{$result->time}}">
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
                    </div>
                    {{--添加区服Over--}}
                </div>
            </div>
        </div>
        <!--开始::结束-->
        </div>

    </main>
@endsection  nav
@section('footer')
@endsection  nav
@section('js')
    <script>
//        点击图片上传图片Start
        function imgClick() {
            document.getElementById("fileToUpload").click();
        }
//        点击图片上传图片Over
//        时间选择Start
        layui.use('laydate', function(){
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#time' //指定元素
            });
        });
//        时间选择Over
    </script>
@endsection  nav
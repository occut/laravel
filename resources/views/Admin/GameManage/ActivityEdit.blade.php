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
            <section class="page-hd" style="margin-top: 15px">
                <header>
                    <h2 class="title">编辑活动</h2>
                </header>
                <hr>
            </section>
            <form action="{{route('Activity.update',['act_id'=>$value->act_id])}}" method="POST" class="layui-form">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="act_id" value="{{$value->act_id}}">
                <div class="form-group-col-2">
                    <div class="form-label">活动类型：</div>
                    <div class="form-cont" style="width: 300px">
                        <select name="act_type" required >
                            <option>请选择活动类型</option>
                            @foreach($types as $type)
                                <option value="{{$type->type_id}}" @if($value->act_type == $type->type_id) selected @endif>{{$type->type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">活动名称：</div>
                    <div class="form-cont">
                        <input type="text" value="{{$value->act_name}}" name="act_name" placeholder="请输入活动名称..." class="form-control form-boxed" style="width: 300px" required >
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">状态：</div>
                    <div class="layui-input-block">
                        <input type="radio" name="status" value="0" title="关闭" @if($value->status==0) checked @endif>
                        <input type="radio" name="status" value="1" title="开启" @if($value->status==1) checked @endif>
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">开始时间：</div>
                    <div class="layui-input-block">
                        <input type="text" value="{{$value->start_time}}" name="start_time" class="layui-input" id="starttime" style="width: 300px" placeholder="开始时间..." required >
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">结束时间：</div>
                    <div class="layui-input-block">
                        <input type="text" value="{{$value->end_time}}" name="end_time" class="layui-input" id="endtime" style="width: 300px" placeholder="结束时间..." required >
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">参加人数：</div>
                    <div class="layui-input-block">
                        <input type="number" value="{{$value->act_num}}" name="act_num" min="1" style="width: 300px" class="layui-input" placeholder="请填写参加人数..." required >
                    </div>
                </div>
                <div class="form-group-col-2">
                    <div class="form-label">活动奖品：</div>
                    <div class="layui-input-block">
                        <textarea  name="act_prize" style="width: 300px" required >{{$value->act_prize}}</textarea>
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
            {{--<!--开始::结束-->--}}
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
    </script>
@endsection  {{--nav--}}
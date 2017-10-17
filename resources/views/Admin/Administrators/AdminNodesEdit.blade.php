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

            <section class="page-hd">
                <header>
                    <h2 class="title">编辑节点</h2>

                </header>
                <hr>
            </section>
            <form action="{{route('AdminNodes.update',['node_id'=>$content->node_id])}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="node_id" value="{{$content->node_id}}">
                @if($content->pid != 0)
                    <div class="form-group-col-2">
                            <div class="form-label">父节点：</div>
                            <div class="form-cont">
                                <input type="text" value="{{$pName->nodename}}"  class="form-control form-boxed" style="width:300px;" readonly>
                            </div>
                    </div>
                @endif
                <div class="form-group-col-2">
                    <div class="form-label">节点名称：</div>
                    <div class="form-cont">
                        <input type="text" name="nodename" value="{{$content->nodename}}" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                @if($content->pid != 0)
                    <div class="form-group-col-2">
                            <div class="form-label">权限值：</div>
                            <div class="form-cont">
                                <input type="text" name="auth" value="{{$content->auth}}" class="form-control form-boxed" style="width:300px;">
                            </div>
                    </div>


                <div class="form-group-col-2">
                    <div class="form-label">URL：</div>
                    <div class="form-cont">
                        <input type="text" name="url" value="{{$content->url}}" placeholder="" value="" class="form-control form-boxed" style="width:300px;">
                    </div>
                </div>
                @endif
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
    </script>
@endsection  {{--nav--}}
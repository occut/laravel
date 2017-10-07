@extends('Admin.layouts.layout_admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="/public/common/treeTable/jquery.treetable.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/public/common/treeTable/jquery.treetable.css">
@endsection  {{--css--}}
@section('nav')
@endsection  {{--nav--}}
@section('header')
@endsection  {{--nav--}}
@section('main')
    <main class="main-cont content mCustomScrollbar">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{route("index.index")}}">首页</a><i class="icon-angle-right"></i></li>
                <li><a href="#">角色管理</a><i class="icon-angle-right"></i></li>
            </ul>
        </div>
        <div style="margin:5px 0px">
            <button class="btn btn-secondary-outline"><a href="{{route("AdminRole.create")}}">添加</a></button>
        </div>
        <!--开始::内容-->
        <table class="table table-bordered table-striped table-hover" id="nodetree">
            <thead>
            <tr>
                <th>ID</th>
                <th>角色</th>
                <th>时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($content))
                @foreach($content as $k=>$v)
                    <tr class="cen">
                        <td>{{$v->role_id}}</td>
                        <td ><a href="#">{{$v->rolename}}</a></td>
                        <td>{{$v->created_at}}</td>
                        <td>
                            <a title="编辑" class="mr-5" href="{{route("AdminRole.edit",['id'=>$v->role_id])}}">编辑</a>
                            <a title="权值" class="mr-5" href="{{route("AdminRole/weight",['id'=>$v->role_id])}}">权值</a>
                            <a title="删除">删除</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </main>
@endsection  {{--nav--}}
@section('footer')
@endsection  {{--nav--}}
@section('js')
@endsection  {{--nav--}}
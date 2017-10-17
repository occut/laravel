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
            <div class="layui-tab layui-tab-card">
                <ul class="layui-tab-title">
                    <li><a href="{{route('Game.index')}}">所有游戏</a></li>
                    <li><a href="javascript:void(0)" class="layui-this">编辑游戏</a></li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <form action="{{route('Game.update',['game_id'=>$result->game_id])}}" method="post" class="layui-form">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="game_id" value="{{$result->game_id}}">
                            <div class="form-group-col-2">
                                <div class="form-label">游戏类型：</div>
                                <div class="form-cont" style="width: 300px">
                                    <select name="game_type" required >
                                        <option @if($result->game_type=="1")selected @endif value="1">休闲益智</option>
                                        <option @if($result->game_type=="2")selected @endif value="2">网络游戏</option>
                                        <option @if($result->game_type=="3") selected @endif value="3">体育竞速</option>
                                        <option @if($result->game_type=="4")selected @endif value="4">角色扮演</option>
                                        <option @if($result->game_type=="5")selected @endif value="5">飞行射击</option>
                                        <option @if($result->game_type=="6")selected @endif value="6">策略经营</option>
                                        <option @if($result->game_type=="7")selected @endif value="7">卡片棋牌</option>
                                        <option @if($result->game_type=="8")selected @endif value="8">动作冒险</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">游戏名称：</div>
                                <div class="form-cont">
                                    <input type="text" name="game_name" placeholder="请输入游戏名称..." class="form-control form-boxed" style="width: 300px" required value="{{$result->game_name}}">
                                </div>
                            </div>
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">使用苹果内购：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="radio" name="iosOrnot" value="1" title="使用">--}}
                                    {{--<input type="radio" name="iosOrnot" value="0" title="不使用" checked>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group-col-2">
                                <div class="form-label">状态：</div>
                                <div class="form-cont">
                                    <input type="radio" name="status" value="0" title="关闭" @if($result->status==0) checked @endif >
                                    <input type="radio" name="status" value="1" title="开启" @if($result->status==1) checked @endif>
                                </div>
                            </div>
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">充值状态：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="radio" name="charge_status" value="0" title="关闭" checked>--}}
                                    {{--<input type="radio" name="charge_status" value="1" title="开启">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group-col-2">
                                <div class="form-label">是否推荐：</div>
                                <div class="form-cont">
                                    <input type="radio" name="recommandOrnot" value="1" title="推荐" @if($result->recommandOrnot==0) checked @endif>
                                    <input type="radio" name="recommandOrnot" value="0" title="不推荐" @if($result->recommandOrnot==1) checked @endif>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">语言：</div>
                                <div class="form-cont">
                                    <input type="radio" name="language" value="0" title="中文" @if($result->language==0) checked @endif>
                                    <input type="radio" name="language" value="1" title="英文" @if($result->language==1) checked @endif>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">推广类型：</div>
                                <div class="form-cont">
                                    <input type="radio" name="promoted_type" value="0" title="CPS推广" @if($result->promoted_type==0) checked @endif>
                                    <input type="radio" name="promoted_type" value="1" title="CPA推广" @if($result->promoted_type==1) checked @endif>
                                    <input type="radio" name="promoted_type" value="2" title="CPS推广和CPA推广" @if($result->promoted_type==2) checked @endif>
                                </div>
                            </div>
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">推广分成比列：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="fencheng_percentage" placeholder="请输入比例..." class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">关键字：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="keyword" placeholder="多关键词之间用空格或者英文逗号分隔" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">游戏官网：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="web" placeholder="" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">游戏bbs：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="bbs" placeholder="" style="width: 300px" required class="form-control form-boxed">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group-col-2">
                                <div class="form-label">游戏攻略：</div>
                                <div class="form-cont">
                                    <input type="text" name="strategy" placeholder="多关键词之间用空格或者英文逗号分隔" class="form-control form-boxed" style="width: 300px" required value="{{$result->strategy}}">
                                </div>
                            </div>
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">游戏币名：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="coin_type" placeholder="金币" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">游戏币比例：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="coin_percent" placeholder="10" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">游戏简写：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="game_simplify" placeholder="" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">CPA单价：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="CPA_price" placeholder="" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">游戏首字母：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="game_initial" placeholder="" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">QQ群：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="qqGroup" placeholder="" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group-col-2">
                                <div class="form-label">游戏下载量：</div>
                                <div class="form-cont">
                                    <input type="number" name="downloaded_num" placeholder="" class="form-control form-boxed" style="width: 300px" required min="1" value="{{$result->downloaded_num}}">
                                </div>
                            </div>
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">IOS程序包名：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="iosPackageName" placeholder="如:com.game.sdk" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">安卓程序包名：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="andPackageName" placeholder="如:com.game.sdk" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">首充折扣：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="discount" placeholder="如：0.5" class="form-control form-boxed" style="width: 300px" required >--}}
                                    {{--<i>* 没有就填1</i>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group-col-2">
                                <div class="form-label">Android游戏下载地址：</div>
                                <div class="form-cont">
                                    <input type="text" name="and_addr" placeholder="" class="form-control form-boxed" style="width: 300px" required value="{{$result->and_addr}}">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">Android版本：</div>
                                <div class="form-cont">
                                    <input type="text" name="and_version" placeholder="Android游戏版本" class="form-control form-boxed" style="width: 300px" required value="{{$result->and_version}}">
                                    <i>* 没有就填1</i>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">IOS游戏下载地址：</div>
                                <div class="form-cont">
                                    <input type="text" name="ios_addr" placeholder="" class="form-control form-boxed" style="width: 300px" required value="{{$result->ios_addr}}">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">IOS版本：</div>
                                <div class="form-cont">
                                    <input type="text" name="ios_version" placeholder="IOS游戏版本" class="form-control form-boxed" style="width: 300px" required value="{{$result->ios_version}}">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">游戏等级：</div>
                                <div class="form-cont">
                                    <input type="number" name="level" placeholder="游戏等级（1-5）" class="form-control form-boxed" style="width: 300px" required min="1" max="5" value="{{$result->level}}">
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="form-label">游戏大小：</div>
                                <div class="form-cont">
                                    <input type="text" name="game_size" placeholder="" class="form-control form-boxed" style="width: 300px" required value="{{$result->game_size}}">
                                </div>
                            </div>
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">测试状态：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="ceshi_status" placeholder="" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group-col-2">
                                <div class="form-label">收费模式：</div>
                                <div class="form-cont">
                                    <input type="text" name="charge_mode" placeholder="" class="form-control form-boxed" style="width: 300px" required value="{{$result->charge_mode}}">
                                </div>
                            </div>
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">运营商：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="text" name="operator" placeholder="" class="form-control form-boxed" style="width: 300px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">安装包类型：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<input type="radio" name="package_type" value="0" title="android" checked>--}}
                                    {{--<input type="radio" name="package_type" value="1" title="ios">--}}
                                    {{--<input type="radio" name="package_type" value="2" title="都有">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group-col-2">
                                <div class="form-label">游戏介绍：</div>
                                <div class="form-cont">
                                    <textarea type="text" name="game_intro" placeholder="" class="form-control form-boxed" style="width: 300px" required>{{$result->game_intro}}</textarea>
                                </div>
                            </div>
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">IOS二维码：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<img src="" width="100px" height="100px" onclick="iosClick()" style="cursor: pointer" id="demo1">--}}
                                    {{--<input type="file" name="iosQrcode"  class="form-control form-boxed" style="width: 300px;display: none" id="iosUpload">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group-col-2">--}}
                                {{--<div class="form-label">Android二维码：</div>--}}
                                {{--<div class="form-cont">--}}
                                    {{--<img src="" width="100px" height="100px" onclick="andClick()" style="cursor: pointer" id="demo2">--}}
                                    {{--<input type="file" name="andQrcode"  class="form-control form-boxed" style="width: 300px;display: none" id="andUpload">--}}
                                {{--</div>--}}
                            {{--</div>--}}
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
<br>
                    </div>
                    {{--添加游戏Over--}}
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
        function iosClick() {
            document.getElementById("iosUpload").click();
        }
        function andClick() {
            document.getElementById("andUpload").click();
        }
        $(".pagination").createPage({
            pageCount:10,
            current:1,
            backFn:function(p){
                console.log(p);
            }
        });
    </script>
@endsection  {{--nav--}}
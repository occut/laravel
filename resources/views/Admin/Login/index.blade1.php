<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>后台登陆</title>
    <link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css" />
</head>
<style>@charset "utf-8";
    /*科e互联特效基本框架CSS*/
    body, ul, dl, dd, dt, ol, li, p, h1, h2, h3, h4, h5, h6, textarea, form, select, fieldset, table, td, div, input {margin:0;padding:0;-webkit-text-size-adjust: none}
    h1, h2, h3, h4, h5, h6{font-size:12px;font-weight:normal}
    body>div{margin:0 auto}
    div {text-align:left}
    a img {border:0}
    body { color: #333; text-align: center; font: 12px "宋体"; }
    ul, ol, li {list-style-type:none;vertical-align:0}
    a {outline-style:none;color:#535353;text-decoration:none}
    a:hover { color: #D40000; text-decoration: none}
    .clear{height:0; overflow:hidden; clear:both}
    .button {display: inline-block;zoom: 1; *display: inline;vertical-align: baseline;margin: 0 2px;outline: none;cursor: pointer;text-align: center;text-decoration: none;font: 14px/100% Arial, Helvetica, sans-serif;padding:0.25em 0.6em 0.3em;text-shadow: 0 1px 1px rgba(0,0,0,.3);-webkit-border-radius: .5em; -moz-border-radius: .5em;border-radius: .5em;-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);box-shadow: 0 1px 2px rgba(0,0,0,.2);
    }
    .red {color: #faddde;border: solid 1px #980c10;background: #d81b21;background: -webkit-gradient(linear, left top, left bottom, from(#ed1c24), to(#A51715));background: -moz-linear-gradient(top,  #ed1c24,  #A51715);filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ed1c24', endColorstr='#aa1317');
    }
    .red:hover { background: #b61318; background: -webkit-gradient(linear, left top, left bottom, from(#c9151b), to(#a11115)); background: -moz-linear-gradient(top,  #c9151b,  #a11115); filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#c9151b', endColorstr='#a11115'); color:#fff;}
    .red:active {color: #de898c;background: -webkit-gradient(linear, left top, left bottom, from(#aa1317), to(#ed1c24));background: -moz-linear-gradient(top,  #aa1317,  #ed1c24);filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#aa1317', endColorstr='#ed1c24');}
    .cor_bs,.cor_bs:hover{color:#ffffff;}
    .keBody{background:url(../images/bodyBg.jpg) repeat #333;}
    .keTitle{height:100px; line-height:100px; font-size:30px; font-family:'微软雅黑'; color:#FFF; text-align:center; background:url(../images/bodyBg3.jpg) repeat-x bottom left; font-weight:normal}
    .kePublic{background:#000; overflow:hidden; position:relative; height:550px;}
    .keBottom{color:#FFF; padding-top:25px; line-height:28px; text-align:center; font-family:'微软雅黑'; background:url(../images/bodyBg2.jpg) repeat-x top left; padding-bottom:25px}
    .keTxtP{font-size:16px; color:#ffffff;}
    .keUrl{color:#FFF; font-size:30px;}
    .keUrl:hover{ text-decoration: underline; color: #FFF; }
    .mKeBanner,.mKeBanner div{text-align:center;}
    /*科e互联特效基本框架CSS结束，应用特效时，以上样式可删除*/
    /* 效果CSS开始 */
    #container{height:550px!important;}
    /* 效果CSS结束 */
    body {
        background: #000000;
        background-size: cover;
        margin: 0;
        padding: 0;
        overflow: hidden;
        width:100%;
    }
</style>
<body>
<div id="container"></div>
<div class="login-box"  style="position:absolute;z-index:1;top:40%;left:36%;background-color:transparent ">
    <form class="layui-form layui-form-pane" action="{{route("login.store")}}" method="post" style="background-color:transparent ">
        <div class="layui-form-item">
            <h3 style="margin:auto;">
                <span style="color:#ffffff;">网站后台管理系统</span><br />
                <span class="version"></span>
            </h3>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
                用户名：</label>
            <div class="layui-input-inline">
                <input type="text" name="username" lay-verify="username" required lay-verify="required" autocomplete="off" class="layui-input" lay-verify="account" placeholder="请输入用户名" maxlength="20" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
                密码：</label>
            <div class="layui-input-inline">
                <input type="password" required lay-verify="required" name="password" class="layui-input" lay-verify="password" placeholder="请输入密码" maxlength="20" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
                验证码
            </label>
            {{--width: 76px;--}}
            <div class="layui-input-inline" style="" >
                <input type="text" name="captcha" id="captcha" placeholder="验证码" required lay-verify="required" autocomplete="off" class="layui-input" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
            </div>

        </div>
        @if (count($errors) > 0)
            <div class="layui-form-item" style="color: #DD4A68;">
                <label class="layui-form-label"></label>
                <div class="layui-input-inline">
                    @foreach ($errors->all() as $error)
                        {!! $error !!}
                    @endforeach
                </div>
            </div>
        @endif
        <div class="layui-form-item" style="">
            <a type="reset" class="layui-btn btn-reset layui-btn-danger" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
                重置</a>
            {{csrf_field()}}
            <button  class="layui-btn btn-submit logSubmit" lay-submit lay-filter="signIn" style="filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;">
                立即登录</button>
            {{--<div class="layui-input-inline" style="width: auto;margin: 0;" >--}}
            <img style="height: 38px;width:100px;margin: 0 10px;display:none;" id="images" src="{{captcha_src()}}" alt="验证码" onclick="this.src='/captcha/default?a='+Math.random(0,10)">
            {{--</div>--}}
        </div>
    </form>
</div>
</body>
</html>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.js"></script>
<script type="text/javascript" src="/public/layui/layui.js"></script>
{{--<script type="text/javascript" src="/public/layui/layui.all.js"></script>--}}
{{--<script type="text/javascript" src="/public/admin/script.js"></script>--}}
<script src="/public/admin/admin.js"></script>
<script>
    //Demo
    layui.use(['form'], function(){
        var form = layui.form;
        form.verify({
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
                    return '用户名不能有特殊字符';
                }
                if(/(^\_)|(\__)|(\_+$)/.test(value)){
                    return '用户名首尾不能出现下划线\'_\'';
                }
                if(/^\d+\d+\d$/.test(value)){
                    return '用户名不能全为数字';
                }
            }
        });
        //监听提交
        form.on('submit(signIn)', function(data){
            var result = post(data.form.action,data.field);
            if(typeof result == 'object' && result.error){
                layer.msg(result.msg, { icon: 6 });
                layer.closeAll('page');
                setTimeout(function () {
                    location.href = result.url;
                }, 1000);
            }else{
                layer.msg(result.msg, { icon: 5 });
            }
            return false;
        });
    });

    $(document).ready(function(){
           $("#captcha").focusin(function(){
              $("#images").show();
           })
        });
    // .focusin
</script>
<script type="text/javascript">//素材家园- www.sucaijiayuan.com
    var Sketch=function(){function e(e){e=n(e||{},l);var t="sketch-"+r++,o=e.hasOwnProperty("canvas"),u=o?e.canvas:document.createElement("canvas");switch(e.type){case m:try{s=u.getContext("webgl",e)}catch(d){}try{s=s||u.getContext("experimental-webgl",e)}catch(d){}if(!s)throw"WebGL not supported";break;case c:try{s=u.getContext("2d",e)}catch(d){}if(!s)throw"Canvas not supported";break;default:u=s=document.createElement("div")}return s.canvas=u,u.className="sketch",o?e.autoresize=!1:(e.container.appendChild(u),e.hasOwnProperty("autoresize")||(e.autoresize=l.autoresize),u.id=t),n(self,g),n(s,e),n(s,p),a(),e.autoresize&&i(),w.push(s),s.autostart&&setTimeout(s.start,0),s}function n(e,n){for(var t in n)e.hasOwnProperty(t)||(e[t]=n[t]);return e}function t(e){function n(e,n){return function(){e.call(n,arguments)}}var t={};for(var o in e)t[o]="function"==typeof e[o]?n(e[o],e):e[o];return t}function o(e,n){e.length=0;for(var t=0,o=n.length;o>t;t++)e[t]=n[t];return e}function a(){function e(e){return M[e]||String.fromCharCode(e)}function n(e){s.mouse.ox=s.mouse.x,s.mouse.oy=s.mouse.y,s.mouse.x=e.x,s.mouse.y=e.y,s.mouse.dx=s.mouse.x-s.mouse.ox,s.mouse.dy=s.mouse.y-s.mouse.oy}function a(e){var n,o=t(e);o.original=e;for(var a=s.canvas,u=0,i=0;a;a=a.offsetParent)u+=a.offsetLeft,i+=a.offsetTop;if(o.touches&&o.touches.length)for(var r,c=o.touches.length-1;c>=0;c--)r=o.touches[c],r.x=r.pageX-u,r.y=r.pageY-i,n=A[c]||r,r.dx=r.x-n.x,r.dy=r.y-n.x,r.ox=n.x,r.oy=n.y,A[c]=t(r);else o.x=o.pageX-u,o.y=o.pageY-i,n=A.mouse||o,o.dx=o.x-n.x,o.dy=o.y-n.y,o.ox=n.x,o.oy=n.y,A.mouse=o;return o}function u(e){e.preventDefault(),e=a(e),o(s.touches,e.touches),n(s.touches[0]),s.touchstart&&s.touchstart(e),s.mousedown&&s.mousedown(e)}function r(e){e=a(e),o(s.touches,e.touches),n(s.touches[0]),s.touchmove&&s.touchmove(e),s.mousemove&&s.mousemove(e)}function c(e){if(e=a(e),e.touches.length)for(var n in A)e.touches[n]||delete A[n];else A={};s.touchend&&s.touchend(e),s.mouseup&&s.mouseup(e)}function m(e){e=a(e),s.mouseover&&s.mouseover(e)}function d(e){e=a(e),s.dragging||(x(s.canvas,"mousemove",h),x(s.canvas,"mouseup",v),y(document,"mousemove",h),y(document,"mouseup",v),s.dragging=!0),o(s.touches,[e]),s.touchstart&&s.touchstart(e),s.mousedown&&s.mousedown(e)}function h(e){e=a(e),n(e),o(s.touches,[e]),s.touchmove&&s.touchmove(e),s.mousemove&&s.mousemove(e)}function f(e){e=a(e),s.mouseout&&s.mouseout(e)}function v(e){e=a(e),s.dragging&&(x(document,"mousemove",h),x(document,"mouseup",v),y(s.canvas,"mousemove",h),y(s.canvas,"mouseup",v),s.dragging=!1),delete A.mouse,s.touchend&&s.touchend(e),s.mouseup&&s.mouseup(e)}function w(e){e=a(e),s.click&&s.click(e)}function l(n){s.keys[e(n.keyCode)]=!0,s.keys[n.keyCode]=!0,s.keydown&&s.keydown(n)}function g(n){s.keys[e(n.keyCode)]=!1,s.keys[n.keyCode]=!1,s.keyup&&s.keyup(n)}var M={8:"BACKSPACE",9:"TAB",13:"ENTER",16:"SHIFT",27:"ESCAPE",32:"SPACE",37:"LEFT",38:"UP",39:"RIGHT",40:"DOWN"};for(var k in M)p.keys[M[k]]=!1;var A={};y(s.canvas,"touchstart",u),y(s.canvas,"touchmove",r),y(s.canvas,"touchend",c),y(s.canvas,"mouseover",m),y(s.canvas,"mousedown",d),y(s.canvas,"mousemove",h),y(s.canvas,"mouseout",f),y(s.canvas,"mouseup",v),y(s.canvas,"click",w),y(document,"keydown",l),y(document,"keyup",g),y(window,"resize",i)}function u(){if(!h){var e=Date.now();s.dt=e-s.now,s.millis+=s.dt,s.now=e,s.update&&s.update(s.dt),s.autoclear&&s.clear(),s.draw&&s.draw(s)}h=++h%s.interval,f=requestAnimationFrame(u)}function i(){if(s.autoresize){var e=s.type===d?s.style:s.canvas;s.fullscreen?(s.height=e.height=window.innerHeight,s.width=e.width=window.innerWidth):(e.height=s.height,e.width=s.width),s.resize&&s.resize()}}var s,r=0,c="canvas",m="web-gl",d="dom",h=0,f=-1,v={},w=[],l={fullscreen:!0,autostart:!0,autoclear:!0,autopause:!0,autoresize:!0,container:document.body,interval:1,type:c},g={PI:Math.PI,TWO_PI:2*Math.PI,HALF_PI:Math.PI/2,QUARTER_PI:Math.PI/4,abs:Math.abs,acos:Math.acos,asin:Math.asin,atan2:Math.atan2,atan:Math.atan,ceil:Math.ceil,cos:Math.cos,exp:Math.exp,floor:Math.floor,log:Math.log,max:Math.max,min:Math.min,pow:Math.pow,round:Math.round,sin:Math.sin,sqrt:Math.sqrt,tan:Math.tan,random:function(e,n){return e&&"number"==typeof e.length&&e.length?e[Math.floor(Math.random()*e.length)]:("number"!=typeof n&&(n=e||1,e=0),e+Math.random()*(n-e))}},p={millis:0,now:0/0,dt:0/0,keys:{},mouse:{x:0,y:0,ox:0,oy:0,dx:0,dy:0},touches:[],initialized:!1,dragging:!1,running:!1,start:function(){s.running||(s.setup&&!s.initialized&&(s.autopause&&(y(window,"focus",s.start),y(window,"blur",s.stop)),s.setup()),s.initialized=!0,s.running=!0,s.now=Date.now(),u())},stop:function(){cancelAnimationFrame(f),s.running=!1},toggle:function(){(s.running?s.stop:s.start)()},clear:function(){s.canvas&&(s.canvas.width=s.canvas.width)},destroy:function(){var e,n,t,o,a,u;w.splice(w.indexOf(s),1),s.stop();for(n in v){for(t=v[n],a=0,u=t.length;u>a;a++)e=t[a],x(e.el,n,e.fn);delete v[n]}s.container.removeChild(s.canvas);for(o in s)s.hasOwnProperty(o)&&delete s[o]}},y=function(){function e(e,n,t){v[n]||(v[n]=[]),v[n].push({el:e,fn:t})}return window.addEventListener?function(n,t,o){n.addEventListener(t,o,!1),e(n,t,o)}:window.attachEvent?function(n,t,o){n.attachEvent("on"+t,o),e(n,t,o)}:function(n,t,o){n["on"+t]=o,e(n,t,o)}}(),x=function(){function e(e,n,t){if(v[n])for(var o,a=v[n].length-1;a>=0;a--)o=v[n][a],o.el===e&&o.fn===t&&v[n].splice(a,1)}return window.removeEventListener?function(n,t,o){n.removeEventListener(t,o,!1),e(n,t,o)}:window.detachEvent?function(n,t,o){n.detachEvent("on"+t,o),e(n,t,o)}:(el["on"+ev]=null,e(el,ev,fn),void 0)}();return{CANVAS:c,WEB_GL:m,DOM:d,instances:w,create:e}}();Date.now||(Date.now=function(){return+new Date}),function(){for(var e=0,n=["ms","moz","webkit","o"],t=0;n.length>t&&!window.requestAnimationFrame;++t)window.requestAnimationFrame=window[n[t]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[n[t]+"CancelAnimationFrame"]||window[n[t]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(n){var t=Date.now(),o=Math.max(0,16-(t-e)),a=window.setTimeout(function(){n(t+o)},o);return e=t+o,a}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(e){clearTimeout(e)})}();</script>
<script type="text/javascript" >//素材家园- www.sucaijiayuan.com
    function Particle( x, y, radius ) {
        this.init( x, y, radius );
    }

    Particle.prototype = {

        init: function( x, y, radius ) {

            this.alive = true;

            this.radius = radius || 10;
            this.wander = 0.15;
            this.theta = random( TWO_PI );
            this.drag = 0.92;
            this.color = '#fff';

            this.x = x || 0.0;
            this.y = y || 0.0;

            this.vx = 0.0;
            this.vy = 0.0;
        },

        move: function() {

            this.x += this.vx;
            this.y += this.vy;

            this.vx *= this.drag;
            this.vy *= this.drag;

            this.theta += random( -0.5, 0.5 ) * this.wander;
            this.vx += sin( this.theta ) * 0.1;
            this.vy += cos( this.theta ) * 0.1;

            this.radius *= 0.96;
            this.alive = this.radius > 0.5;
        },

        draw: function( ctx ) {

            ctx.beginPath();
            ctx.arc( this.x, this.y, this.radius, 0, TWO_PI );
            ctx.fillStyle = this.color;
            ctx.fill();
        }
    };

    // ----------------------------------------
    // Example
    // ----------------------------------------

    var MAX_PARTICLES = 280;
    var COLOURS = [ '#69D2E7', '#A7DBD8', '#E0E4CC', '#F38630', '#FA6900', '#FF4E50', '#F9D423' ];

    var particles = [];
    var pool = [];

    var demo = Sketch.create({
        container: document.getElementById( 'container' )
    });

    demo.setup = function() {

        // Set off some initial particles.
        var i, x, y;

        for ( i = 0; i < 20; i++ ) {
            x = ( demo.width * 0.5 ) + random( -100, 100 );
            y = ( demo.height * 0.5 ) + random( -100, 100 );
            demo.spawn( x, y );
        }
    };

    demo.spawn = function( x, y ) {

        if ( particles.length >= MAX_PARTICLES )
            pool.push( particles.shift() );

        particle = pool.length ? pool.pop() : new Particle();
        particle.init( x, y, random( 5, 40 ) );

        particle.wander = random( 0.5, 2.0 );
        particle.color = random( COLOURS );
        particle.drag = random( 0.9, 0.99 );

        theta = random( TWO_PI );
        force = random( 2, 8 );

        particle.vx = sin( theta ) * force;
        particle.vy = cos( theta ) * force;

        particles.push( particle );
    }

    demo.update = function() {

        var i, particle;

        for ( i = particles.length - 1; i >= 0; i-- ) {

            particle = particles[i];

            if ( particle.alive ) particle.move();
            else pool.push( particles.splice( i, 1 )[0] );
        }
    };

    demo.draw = function() {

        demo.globalCompositeOperation  = 'lighter';

        for ( var i = particles.length - 1; i >= 0; i-- ) {
            particles[i].draw( demo );
        }
    };

    demo.mousemove = function() {

        var particle, theta, force, touch, max, i, j, n;

        for ( i = 0, n = demo.touches.length; i < n; i++ ) {

            touch = demo.touches[i], max = random( 1, 4 );
            for ( j = 0; j < max; j++ ) demo.spawn( touch.x, touch.y );
        }
    };
</script>
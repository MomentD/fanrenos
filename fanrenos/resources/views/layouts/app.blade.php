<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="{{ config('blog.description') }}">
<meta name="author" content="{{ config('blog.author') }}">
<meta name="keywords" content="{{ config('blog.keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>{{ $title or config('blog.title') }}| @yield('title')</title>
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<link rel="icon" type="image/ico" href="{{asset('favicon.ico')}}">
<meta name="mobile-web-app-capable" content="yes">
<link rel="icon" sizes="192x192" href="{{asset('favicon.ico')}}">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Amaze UI"/>
<link rel="apple-touch-icon-precomposed" href="{{asset('favicon.ico')}}">
<meta name="msapplication-TileImage" content="{{asset('favicon.ico')}}">
<meta name="msapplication-TileColor" content="#0e90d2">
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/public.css')}}">
<style type="text/css">
    .log-footer,.log-footer a{color: #fff;}
    .log-footer a:hover{color: #10D4AF;}
</style>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?7e53f041994830ce53d57fb718e5d98a";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
    <header>
        <div class="log-header">
            <h1 style="margin: 20px 0 10px 0;"><a href="{{url('/')}}">{{ config('blog.name') }}</a> </h1>
        </div>    
        <div class="log-re">
            @yield('header')
        </div> 
    </header>

    @yield('content')
    
    <footer class="log-footer">
        Copyright © {{ config('blog.author') }} 2017. Made with love <a href="{{url('/')}}">{{config('blog.name')}}</a> 
    </footer>
    <!-- Scripts -->
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/amazeui/2.7.2/js/amazeui.min.js"></script>
    <script src="https://cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
    @yield('js')
    <script type="text/javascript">
        @if (count($errors) > 0)
            var error = "{{$errors->first('email')}}";
            var pd = '<br>'+"{{$errors->first('password')}}";
            var pd_conf = '<br>'+"{{$errors->first('password_confirmation')}}";
            layer.open({
                type: 1,
                skin: 'layui-layer-lan', //样式类名
                closeBtn: 0, //不显示关闭按钮
                anim: 2,
                area: ['400px', '120px'],
                shadeClose: true, //开启遮罩关闭
                content: '<p style="margin:0px;text-align:center;">'+error+pd+pd_conf+'</p>',
            });
        @endif
        @if(session('status'))
            var success = "{{session('status')}}";
            layer.open({
                type: 1,
                skin: 'layui-layer-lan', //样式类名
                closeBtn: 0, //不显示关闭按钮
                anim: 2,
                area: ['400px', '100px'],
                shadeClose: true, //开启遮罩关闭
                content: '<p style="margin:0px;text-align:center;">'+success+'</p>',
            });
        @endif
        function toJump(url,target){
            if(target=='_blank'){
                window.open(url);
            }else{
                window.location.href = url;
            }
        }
    </script>
</body>
</html>

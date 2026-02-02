<html data-dpr="1" style="font-size: 37.5px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <title>home</title>
    <link href="{{asset('static_new6/css/app.3227f3b635185d55fe635aae11c7880e.css')}}" rel="stylesheet">
    <link href="{{asset('static_new6/css/new.css')}}" rel="stylesheet">
    <script charset="utf-8" src="{{asset('static_new/js/jquery.min.js')}}"></script>
    <link href="{{asset('static_new6/layui/layui.css')}}" rel="stylesheet">
    <script src="{{asset('static_new6/layui/layui.js')}}"></script>
    <link id="layuicss-laydate" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/laydate/default/laydate.css?v=5.3.1')}}"
          media="all">
    <link id="layuicss-layer" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/layer/default/layer.css?v=3.5.1')}}" media="all">
    <script>
        layui.use('carousel', function () {
            var carousel = layui.carousel;
            //建造实例
            carousel.render({
                elem: '#test1'
                , width: '95%' //设置容器宽度
                , arrow: 'always' //始终显示箭头
                , height: '150px',
                //,anim: 'updown' //切换动画方式
            });
        });

    </script>
    <style type="text/css" title="fading circle style">
        body {
            /*background: url({{asset('pic/loginbg.jpg')}} !important;*/
            background-size: 100% 100% !important;
            background-repeat: no-repeat;
            background-attachment: fixed !important;
            color: #F1AC04;
        }

        .main {
            /*background-color: #F0F8FF !important;*/
            padding-bottom: 0rem !important;
            color: #F1AC04;
        }

        a {
            color: #F1AC04;
        }

        b.bred {
            color: #F1AC04;
        }

        .circle-color-23 > div::before {
            background-color: #ccc;
        }

        @media screen and (max-width: 360px) {

        }

        .announcement-task .a-t-items {
            width: 45% !important;
            padding: 10px;
        }

        .a-t-t-3 > img[data-v-eebac136] {
            width: 100%;
            margin-top: .16rem;
            height: 100%;

        }

        .a-t-text[data-v-eebac136] {
            position: relative;
        }

        .a-t-text[data-v-eebac136] {
            left: 0;
        }

        .a-t-text[data-v-eebac136] {
            top: .1rem;
        }

        .aui li[data-v-eebac136] {
            width: 20%;
        }

        .swiper-container {
            height: 6.8rem;
            --swiper-pagination-color: #FCB28E;
        }

        .swiper-slide img {
            width: 95%;
            height: 100%;
            border: none;
            margin: 5px 10px;
        }

        .swiper-pagination-bullet-active {
            background-color: #FCB28E;
        }

        .livechat-girl {
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            position: fixed;
            bottom: 0.5rem;
            /* right: 0.6rem; */
            opacity: 0;
            left: 50%;
            margin-left: 3.33rem;
            -webkit-box-shadow: 0 0.1rem 0.2rem 0 rgba(35, 50, 56, .3);
            box-shadow: 0 5px 10px 0 rgba(35, 50, 56, .3);
            z-index: 700;
            transform: translateY(0);
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            cursor: pointer;
            -webkit-transition: all 1s cubic-bezier(.86, 0, .07, 1);
            transition: all 1s cubic-bezier(.86, 0, .07, 1);
        }

        .livechat-girl.animated {
            opacity: 1;
            transform: translateY(-1.3rem);
            -webkit-transform: translateY(-1.3rem);
            -ms-transform: translateY(-1.3rem);
        }

        .animated {
            -webkit-animation-duration: .5s;
            animation-duration: .5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .livechat-girl .girl {
            position: absolute;
            top: 0;
            c
            left: 0;
            width: 100%;
            height: auto;
            z-index: 15;
        }

        .livechat-girl img {
            vertical-align: middle;
        }

        .livechat-girl .animated-circles.animated .c-2 {
            animation: 2.5s scaleToggleTwo cubic-bezier(.25, .46, .45, .94) forwards;
        }

        .livechat-girl .animated-circles .circle {
            background: rgba(38, 199, 252, .25);
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            position: absolute;
            z-index: 14;
            transform: scale(1);
            -webkit-transform: scale(1);
        }

        #middle {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #middle li {
            height: 100%;
        }

        .text[data-v-eebac136] {
            width: 100% !important;
        }

        .demo-class {
            border-radius: 10px;
            box-shadow: none;
        }

        body .demo-class .layui-layer-title {
            background: #fff;
            color: #F1AC04;
            border: none;
            text-align: center;
            padding: 0px;
            border-radius: 10px 10px 0px 0px;
        }

        body .demo-class .layui-layer-btn {
            border-top: 1px solid #E9E7E7;
        }

        body .demo-class .layui-layer-btn a {
            background: #333;
        }

        .layui-layer-btn .layui-layer-btn1 {
            border-color: #F79700 !important;
            background-color: #F79700 !important;
            color: #fff !important;
            float: right;
            /* width: 100%; */
            margin-top: 50px;
        }

        #accd {
            padding: 10px;
            height: 80%;
            overflow-y: auto;
        }

        .demo-class {
            background: url('{{asset('pic/homeTK.png')}}');
            background-size: 100% 100%;
        }

        .layui-layer-btn .layui-layer-btn0 {
            border-color: #F79700 !important;
            background-color: #F79700 !important;
            color: #fff !important;
        }

        #ctt div {
            display: flex;
            padding: 10px;
            width: 100%;
            flex-wrap: wrap;
        }

        #ctt div botton {
            margin: 10px;
            padding: 15px;
            width: 100%;
            border: 1px solid #000;
            border-radius: 10px;
        }

        a {
            color: #F1AC04;
        }

        .circle-color-23 > div::before {
            background-color: #ccc;
        }

        @media screen and (max-width: 360px) {

        }

        .announcement-task .a-t-items {
            width: 45% !important;
            padding: 10px;
        }

        .a-t-t-3 > img[data-v-eebac136] {
            width: 100%;
            margin-top: .16rem;
            height: 100%;

        }

        .a-t-text[data-v-eebac136] {
            position: relative;
        }

        .a-t-text[data-v-eebac136] {
            left: 0;
        }

        .a-t-text[data-v-eebac136] {
            top: .1rem;
        }

        .aui li[data-v-eebac136] {
            width: 20%;
        }

        .swiper-container {
            height: 6.8rem;
            --swiper-pagination-color: #FCB28E;
        }

        .swiper-slide img {
            width: 95%;
            height: 100%;
            border: none;
            margin: 5px 10px;
        }

        div.chat {
            width: 1.6rem;
            height: 1.6rem;
            border-radius: 50%;
            position: fixed;
            bottom: 0.5rem;
            right: 0.6rem;
            left: 50%;
            margin-left: 3.33rem;
            top: 40%;
            background: #fff;
            padding: 5px;
            /*border: 1px solid #ccc;*/
        }

        div.chat img {
            width: 1rem;
            height: 1rem;
            margin: 7px;
        }

        .swiper-pagination-bullet-active {
            background-color: #FCB28E;
        }

        .livechat-girl {
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            position: fixed;
            bottom: 0.5rem;
            /* right: 0.6rem; */
            opacity: 0;
            left: 50%;
            margin-left: 3.33rem;
            -webkit-box-shadow: 0 0.1rem 0.2rem 0 rgba(35, 50, 56, .3);
            box-shadow: 0 5px 10px 0 rgba(35, 50, 56, .3);
            z-index: 700;
            transform: translateY(0);
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            cursor: pointer;
            -webkit-transition: all 1s cubic-bezier(.86, 0, .07, 1);
            transition: all 1s cubic-bezier(.86, 0, .07, 1);
        }

        .livechat-girl.animated {
            opacity: 1;
            transform: translateY(-1.3rem);
            -webkit-transform: translateY(-1.3rem);
            -ms-transform: translateY(-1.3rem);
        }

        .animated {
            -webkit-animation-duration: .5s;
            animation-duration: .5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .livechat-girl .girl {
            position: absolute;
            top: 0;
            c
            left: 0;
            width: 100%;
            height: auto;
            z-index: 15;
        }

        .livechat-girl img {
            vertical-align: middle;
        }

        .livechat-girl .animated-circles.animated .c-2 {
            animation: 2.5s scaleToggleTwo cubic-bezier(.25, .46, .45, .94) forwards;
        }

        .livechat-girl .animated-circles .circle {
            background: rgba(38, 199, 252, .25);
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            position: absolute;
            z-index: 14;
            transform: scale(1);
            -webkit-transform: scale(1);
        }

        #middle {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #middle li {
            height: 100%;
        }

        .text[data-v-eebac136] {
            width: 100% !important;
        }

        .demo-class {
            border-radius: 10px;
        }

        body .demo-class .layui-layer-title {
            background: #F7970000;
            color: #F1AC04;
            border: none;
            text-align: center;
            padding: 0px;
            border-radius: 10px 10px 0px 0px;
            font-size: 18px;
            font-weight: 600;
        }

        body .demo-class .layui-layer-btn {
            border-top: 0px solid #E9E7E7;
            margin-top: -20%;
            text-align: center;
            position: relative;
        }

        body .demo-class .layui-layer-btn a {
            background: #333;
            border-radius: 8px;
        }

        body .demo-class .layui-layer-btn .layui-layer-btn1 {
            background: #7399c6;
        }

        #accd {
            padding: 10px;
        }

        .layui-layer-btn .layui-layer-btn0 {
            border-color: #F79700 !important;
            background-color: #F79700 !important;
            color: #fff !important;
            width: 100%;
            height: 40px;
            line-height: 40px;
        }

        #ctt div {
            display: flex;
            padding: 10px;
            width: 100%;
            flex-wrap: wrap;
        }

        #ctt div botton {
            margin: 10px;
            padding: 15px;
            width: 100%;
            border: 1px solid #000;
            border-radius: 10px;
        }

        .layui-tab-title .layui-this:after {
            position: absolute;
            left: 0;
            top: 0;
            content: '';
            width: 100%;
            height: 41px;
            border: none;
            box-sizing: border-box;
            pointer-events: none;
        }

        .layui-tab-title {
            display: flex;
            overflow: hidden;
            width: 95%;
            margin: 0 auto;
        }

        .layui-tab-title li {
            position: relative;
            flex: 1;
            padding: 10px 20px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
            color: #fff;
            line-height: 20px;
        }

        .layui-tab-title .layui-this {
            background-color: #F79700;
            color: #fff;
        }

        .layui-tab-title li:not(.layui-this) {
            background-color: #ccc; /* Inactive tab color */
        }

        .layui-tab-title li::before {
            content: "";
            position: absolute;
            top: 0;
            right: -20px;
            width: 40px;
            height: 100%;
            background-color: inherit; /* Match the tab's background color */
            transform: skewX(-20deg);
            z-index: 1;
        }

        .layui-tab-title li:last-child::before {
            display: none; /* Remove skew effect from the last tab */
        }

        .ONE {
            float: left;
            text-align: center;
            margin-left: -0.2rem;
        }

        .ONE p {
            background: #e4b275;
            margin-left: 0.4rem;
        }

        .ONE P {
            width: 40px;
            height: 41px;
            border-radius: 50%;
            margin-bottom: 10px;
            box-shadow: 2px 1px 8px 3px #e2dfdf;
            margin: 0 1rem;
        }

        div.itemd {
            display: flex;
            flex-wrap: wrap;
            height: auto;
            justify-items: center;
            margin: 10px 10px;
            background: #fff;
            box-shadow: 0 0 10px 0 rgb(0 0 0 / 20%);
        }

        .ONE img {
            width: 85%;
            height: 54%;
            margin-top: 9px;
        }

        .ONE div {
            margin-top: 1rem;
            color: #F1AC04;
        }

        .status_icon {
            height: 35px !important;
            width: 35px !important;
            position: absolute;
            right: 10px;
        }

        .l_left {
            text-align: end;
        }

        .ddsa {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .ddsa span {
            font-size: 12px;
            font-weight: bold;
            color: #F1AC04;
        }

        .ddsas {
            justify-content: center;
            display: flex;
            align-items: center;
        }

        .licaibao {
            display: flex;
            flex-wrap: wrap;
        }

        .metal button {
            text-align: center;
            width: 100%;
            justify-content: center;
            text-align: center;
            border-radius: 20px;
            height: 30px;
            margin: 0 auto;
            font-size: 12px;
            padding: 0 9px;
        }

        .yushou {
            background: #ccc;
        }

        .zaishou {
            background: #F79700;
            color: #fff;
            margin-top: 20px;
        }
        
         .zaishou1 {
            background: #716e6a;
            color: #fff;
            margin-top: 20px;
        }

        .shouwan {
            background: red;
        }

        .lxb .item {
            width: 100%;
        }

        .lxb {
            height: fit-content;
        }

        .desc {
            color: #F1AC04;
            font-size: 12px;
            font-weight: bold;
            width: 100%;
            text-align: left;
            margin: 10px 0px;
        }

        .l_title {

        }

        .lx {
            display: flex;
            flex-wrap: wrap;
            width: 100%;

        }

        .licaibao {
            width: 100%;
            height: fit-content;
        }

        .biaoti {
            height: auto;
            font-size: 15px;
            text-align: center;
            width: 100%;
            color: #F1AC04;
        }

        #app {
            margin-bottom: 100px;
            background: #f1f1f1;
        }

        #test1 {
            background-color: #fff;
            padding: 16px;
            border-radius: 5px 5px 0 0;
        }

        #test1 div {
            border-radius: 0px;
        }

        .buy-class {
            border-radius: 20px;
            width: 80%;
            /*height: 115px;*/
        }

        .buy-class .layui-layer-btn {
            text-align: center;
        }

        .buy-class a {
            border-radius: 10px;
        }

        .buy-class a:nth-child(1) {
            margin-right: 20%;
        }

        .btnt {
            width: 30px;
            margin-right: 30px;
        }

        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /*padding: 20px;*/
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }

        .modal-header {
            font-size: 1.5em;
            margin-bottom: 15px;
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #d1d1d1;
            color: #F1AC04;
        }

        .modal-body {
            padding: 10px;
            text-align: center;
            margin-bottom: 0px;
            color: #F1AC04;
        }

        .modal-body img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .modal-footer {
            text-align: center;
        }

        .close-btn {
            background-color: #F79700;
            color: white;
            padding: 10px 20px;
            border: none;
            /*border-radius: 5px;*/
            cursor: pointer;
            width: 100%;
            font-size: 1em;
        }

        .l_title {
            width: 100%;
        }

        .metal_c {
            position: absolute;
            right: 0px;
            top: 0px;
            width: 130px;
            height: 30px;
            background: #F79700;
            color: #fff;
            padding-left: 20px;
            border-radius: 0 5px 0 0;
        }

        .metal_c .day {
            color: #fff;
        }

        .metal_c::before {
            content: "";
            position: absolute;
            top: 0;
            left: -10px;
            width: 20px;
            height: 100%;
            background-color: #fff;
            transform: skew(211deg);
        }

        .metal_c::after {
            content: "";
            position: absolute;
            top: 0;
            left: -0px;
            width: 5px;
            height: 100%;
            background-color: #F79700;
            transform: skew(211deg);
        }

        .metal {
            margin-top: 5px;
        }

        .metal button {
            border-radius: 0;
        }

        div.item {
            padding-bottom: 0;
        }

        .l_left {
            padding-top: 0;
            margin-top: 14px;
        }
        .layui-layer-btn .layui-layer-btn1 {
            border-color: #F79700 !important;
            background-color: #F79700 !important;
            color: #fff !important;
            float: right;
            /* width: 100%; */
            margin-top: 15px;
            margin-bottom: 10px;
            width: 93%;
            border-radius: unset;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css">
    <style>
        .carousel__slide__inner {
            overflow: hidden;
            position: relative;
        }
        .doAnimation .slick-active .carousel__slide__inner .carousel__image {
            animation: scale-out 0.875s cubic-bezier(0.7, 0, 0.3, 1) 0.375s both;
            transform: scale(1.3);
        }
        .carousel__slide__overlay {
            background-color: transparent;
            background-size: 100%;
            height: 100%;
            left: 0;
            opacity: 0.5;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 2;
        }
        .slick-active .carousel__slide__overlay {
            animation: scale-in-hor-left 1.375s cubic-bezier(0.645, 0.045, 0.355, 1) 0.25s reverse both;
        }
        .carousel__image {
            height: 100%;
            object-fit: cover;
            position: relative;
            transform: scale(1);
            width: 100%;
            z-index: 1;
        }
        @keyframes scale-out {
            0% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1);
            }
        }
        @keyframes scale-in-hor-left {
            0% {
                -webkit-transform: translateX(-100%) scaleX(0);
                transform: translateX(-100%) scaleX(0);
                -webkit-transform-origin: 0% 0%;
                transform-origin: 0% 0%;
                opacity: 1;
            }
            50% {
                -webkit-transform: translateX(-50%) scaleX(0.5);
                transform: translateX(-50%) scaleX(0.5);
                -webkit-transform-origin: 0% 0%;
                transform-origin: 0% 0%;
                opacity: 1;
            }
            100% {
                -webkit-transform: translateX(0) scaleX(1);
                transform: translateX(0) scaleX(1);
                -webkit-transform-origin: 0% 0%;
                transform-origin: 0% 0%;
                opacity: 1;
            }
        }
        .slick-dotted.slick-slider {
            margin-bottom: 8px;
        }
        .modal-content {
    background-color: #fefefe;
    margin: 46% auto;
}
    </style>
</head>
<body>
<div id="app">
    <div data-v-eebac136="" class="main">
        <div style="width: 100%;">
            <div class="carousel" style="height: 220px;overflow: hidden;">
                @foreach(\App\Models\VipSlider::get() as $element)
                <div class="carousel__slide">
                    <img style="height: 220px;width: 100%;" src="{{asset($element->photo)}}" alt="">
                </div>
                @endforeach
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
            <script>
                // find elements
                var carousel = $(".carousel");

                var options = {
                    adaptiveHeight: true,
                    arrows: false,
                    dots: true,
                    fade: true,
                    infinite: false,
                    mobileFirst: true,
                    rows: 0,
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    speed: 0,
                    zIndex: 75,
                    autoplay:true,
                };

                var addAnimationClass = true;

                carousel.on('beforeChange', function(e, slick, current, next) {
                    var current = carousel.find('.slick-slide')[current];
                    var next = carousel.find('.slick-slide')[next];
                    var src = $(current).find('.carousel__image').attr('src');

                    $(next).find('.carousel__slide__overlay').css('background-image', 'url("' + src + '")');


                    if(addAnimationClass) {
                        carousel.addClass('doAnimation');

                        // so that adding the class only happens once
                        addAnimationClass = false;
                    }
                });

                carousel.not('.slick-initialized').slick(options);
            </script>

        </div>
        <div class="icon-list">
            <ul>
                <li onclick="window.location.href=`{{route('user.deposit')}}`" style=""><img
                        src="{{asset('pic/icon/shiba.png')}}"><span style="color: #F1AC04;">Recharge</span></li>
                <li onclick="window.location.href=`{{route('user.withdraw')}}`" style=""><img
                     src="{{asset('pic/icon/rupee1.png')}}"><span style="color: #F1AC04;">Withdraw</span></li>
                <li onclick="window.location.href='https://t.me/+1fjaTnS-uV85MThl'" style=""><img
                        src="{{asset('pic/icon/telegram4.png')}}"><span style="color: #F1AC04;">Channel</span></li>

                <li onclick="window.location.href=`https://t.me/TNL_LAB_WEBSITE_DEVELOPER`" style=""><img
                        src="{{asset('pic/icon/cs1.png')}}"><span style="color: #F1AC04;">Online</span></li>
                <li onclick="window.location.href=`https://t.me/TNL_LAB_WEBSITE_DEVELOPER`" style=""><img
                        src="{{asset('pic/icon/downloading.png')}}"><span style="color: #F1AC04;">Download</span></li>
            </ul>
        </div>
<div class="layui-tab">
    <ul class="layui-tab-title">
        <li class="layui-this" style="margin-right: 0px;">LOW YIELD PLANS</li>
        <li>HIGH YIELD PLANS</li>
    </ul>
    <div class="layui-tab-content">
        {{-- Normal Packages --}}
        <div class="layui-tab-item layui-show">
            <div class="licaibao">
                @foreach(\App\Models\Package::where('type','normal')->get() as $element)
                    <?php
                    $commission = $element->price * $element->commission_with_avg_amount / 100;
                    ?>
                    <div class="item" cid="{{$element->id}}">
                        <div class="l_title"><h1 style="color: #F1AC04;">DAILY INCOM DAILY WITHDRAW</h1>
                            <p style="display:none" class="kbuy_{{$element->id}}">99</p></div>
                        <div class="l_left"><img src="{{asset($element->photo)}}"></div>
                        <div class="metal metal_c"><span class="l_desc" style="color: #fff;">Price:</span>
                            <span class="day" style="color: #fff;">₹{{ number_format($element->price, 0) }}</span>
                        </div>
                        <div class="l_right">
                            <div class="l_meta">
                                <div class="metal metal_a"><span class="l_desc" style="color: #F1AC04;">Daily income:</span>
                                    <span class="day" style="color: #F1AC04;">₹{{ number_format($element->commission_with_avg_amount / $element->validity, 0) }}</span>
                                </div>
                                <div class="metal metal_b"><span class="l_desc" style="color: #F1AC04;">Cycle:</span>
                                    <span class="day" style="color: #F1AC04;">{{$element->validity}} day</span>
                                </div>
                                <div class="metal"><span class="l_desc" style="color: #F1AC04;">Total:</span>
                                    <span class="day" style="color: #F1AC04;">₹{{ number_format($element->commission_with_avg_amount, 0) }}</span>
                                </div>
                                <div class="metal">
                                    <div style="margin: 0 auto;width:100%;">
                                        @if($element->presale == 'yes')
                                            <button class="zaishou1 bbttom" disabled>Pre-Sale</button>
                                        @else
                                            <button class="zaishou bbttom buy" cid="{{$element->id}}">Buy Now</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Welfare Packages --}}
        <div class="layui-tab-item">
            <div class="licaibao">
                @foreach(\App\Models\Package::where('type','welfare')->get() as $element)
                    <?php
                    $commission = $element->price * $element->commission_with_avg_amount / 100;
                    ?>
                    <div class="item" cid="{{$element->id}}">
                        <div class="l_title"><h1 style="color: #F1AC04;">DAILY INCOM DAILY WITHDRAW</h1>
                            <p style="display:none" class="kbuy_{{$element->id}}">99</p></div>
                        <div class="l_left"><img src="{{asset($element->photo)}}"></div>
                        <div class="metal metal_c"><span class="l_desc" style="color: #fff;">Price:</span>
                            <span class="day" style="color: #fff;">₹{{ number_format($element->price, 0) }}</span>
                        </div>
                        <div class="l_right">
                            <div class="l_meta">
                                <div class="metal metal_a"><span class="l_desc" style="color: #F1AC04;">Daily income:</span>
                                    <span class="day" style="color: #F1AC04;">₹{{ number_format($element->commission_with_avg_amount / $element->validity, 0) }}</span>
                                </div>
                                <div class="metal metal_b"><span class="l_desc" style="color: #F1AC04;">Cycle:</span>
                                    <span class="day" style="color: #F1AC04;">{{$element->validity}} day</span>
                                </div>
                                <div class="metal"><span class="l_desc" style="color: #F1AC04;">Total:</span>
                                    <span class="day" style="color: #F1AC04;">₹{{ number_format($element->commission_with_avg_amount, 0) }}</span>
                                </div>
                                <div class="metal">
                                    <div style="margin: 0 auto;width:100%;">
                                        @if($element->presale == 'yes')
                                            <button class="zaishou bbttom" disabled>Presale</button>
                                        @else
                                            <button class="zaishou bbttom buy" cid="{{$element->id}}">Buy Now</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('app.layout.manu')

@if(!session()->has('buy'))
<div id="myModal" class="modal" style="display: block;">
    <div class="modal-content">
        <div class="modal-header">Notice</div>
        <div class="modal-body">            
            <p style="text-align: center; color: #F1AC04;"><strong><span style="font-size:16px;">Welcome to join PEDIGREE 
All plans Daily income Daily withdrawal</span></strong></p>
            <p style="text-align: center; color: #000000; font-size:12px;">
                Minimum Recharge 580rs<br>
                Minimum withdrawal 150rs<br>
                Get 24% commission bonus for inviting members<br>
                Invitation commission:<br>
                Level 1->20%<br>
                Level 2->3%<br>
                Level 3->1%
            </p>
        </div>
        <div class="modal-footer">
            <button class="close-btn" onclick="window.location.href=`https://t.me/TNL_LAB_WEBSITE_DEVELOPER`" style="margin: 10px 0; background: #1296db;">Telegram Channel</button>
            <button class="close-btn1 close-btn" onclick="closeWelcome()">Ok</button>
        </div>
    </div>
</div>
@endif
<div id="snackbar" style="
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: grey;
    color: white;
    text-align: center;
    border-radius: 5px;
    padding: 16px;
    position: fixed;
    z-index: 9999;
    left: 50%;
    top: 50%;
    font-size: 16px;
">
</div>


<style>
  #confirmPurchaseDialog {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
    padding: 20px;
    border: none;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    max-width: 300px;
    width: 90%;
    background: white;
    z-index: 10000;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
</style>

<script>
function closeWelcome() {
    document.querySelector('#myModal').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    // Show modal if exists
    var modal = document.getElementById('myModal');
    if(modal) modal.style.display = 'block';

    window.onclick = function(event) {
        if(event.target.id == 'myModal') modal.style.display = 'none';
    }

    document.addEventListener('click', function(e) {
        var btn = e.target.closest('.buy');
        if(btn) {
            var cid = btn.getAttribute('cid');
            console.log("Buy clicked with cid:", cid);
            if(!cid) {
                alert("Error: Package id (cid) missing!");
                return;
            }
            // Show modal popup without layer.js using native dialog element
            if (!document.getElementById('confirmPurchaseDialog')) {
                const dialog = document.createElement('dialog');
                dialog.id = 'confirmPurchaseDialog';
                dialog.innerHTML = `
                    <form method="dialog" style="padding: 20px; text-align: center; max-width: 280px; margin: 0;">
                        <h2 style="margin-bottom: 10px; color: #212121; font-weight: 600;">Confirm Purchase</h2>
                        <p style="color: #666; font-size: 14px; margin-bottom: 20px;">Are you sure you want to buy this plan?</p>
                        <menu style="display: flex; gap: 10px; justify-content: center;">
                            <button id="confirmYes" style="flex:1; background:#FFA500; color:#fff; border:none; border-radius:5px; padding:8px 0; font-weight: 500; cursor: pointer;">Yes</button>
                            <button id="confirmNo" style="flex:1; background:#fff; color:#FFA500; border:1.5px solid #FFA500; border-radius:5px; padding:8px 0; font-weight: 500; cursor: pointer;">No</button>
                        </menu>
                    </form>
                `;
                document.body.appendChild(dialog);
                dialog.querySelector('#confirmYes').addEventListener('click', function() {
                    window.location.href = '{{ url("purchase/confirmation") }}/' + cid;
                    dialog.close();
                });
                dialog.querySelector('#confirmNo').addEventListener('click', function() {
                    dialog.close();
                });
            }
            const dialog = document.getElementById('confirmPurchaseDialog');
            dialog.showModal();
        }
    });

    // Marquee script remains unchanged
    var speed = 150;
    var app = document.getElementById('middle');
    if(app){
        var slide1 = document.getElementById('slide1');
        var slide2 = document.getElementById('slide2');
        slide2.innerHTML = slide1.innerHTML;
        var timer, timeout;
        function marqueeMethods() {
            clearTimeout(timeout);
            if(slide2.offsetTop - app.scrollTop <= 0) app.scrollTop = app.scrollTop - slide1.offsetHeight;
            else {
                app.scrollTop++;
                if(app.scrollTop % ($('#slide1 li').eq(0).height()) === 0){
                    clearTimeout(timeout); clearInterval(timer);
                    timeout = setTimeout(function(){ app.scrollTop++; timer=setInterval(marqueeMethods,speed); },2000);
                }
            }
        }
        timer = setInterval(marqueeMethods,speed);
    }
});
</script>


@include('alert-message')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
</body>
</html>

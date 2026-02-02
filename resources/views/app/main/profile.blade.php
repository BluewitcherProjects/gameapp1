<html data-dpr="1" style="font-size: 37.5px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <title>My</title>
    <link href="{{asset('static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static_new/css/public.css')}}">
    <link rel="stylesheet" href="{{asset('static_new6/css/new.css')}}">
    <link href="{{asset('static_new6/layui/layui.css')}}" rel="stylesheet">
    <script src="{{asset('static_new6/layui/layui.js')}}"></script>
    <link id="layuicss-laydate" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/laydate/default/laydate.css?v=5.3.1')}}"
          media="all">
    <link id="layuicss-layer" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/layer/default/layer.css?v=3.5.1')}}" media="all">
    <script charset="utf-8" src="{{asset('static_new/js/jquery.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/dialog.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/common.js')}}"></script>
    <style type="text/css" title="fading circle style">
        body {
            padding-top: 0 !important;
            color: #F1AC04;
        }

        .main[data-v-d5f15326] {
            margin-top: 0 !important;
        }

        html, body, #app, .main {
            height: 100%;
            background: #f1f1f1 !important;
            /*margin-bottom: 300px;*/
            overflow-y: hidden;
            color: #F1AC04;
        }

        .circle-color-8 > div::before {
            background-color: #ccc;
        }

        .login_nav li a {
            display: block;
            width: 100%;
        }

        .bor {
            border: none;
            background: #ff9700;
            margin: 5px;
            width: 30.5%;
        }

        .info {
            display: flex !important;
            align-items: center !important;
            /*justify-content: center;*/
            /*flex-wrap: wrap;*/
            text-align: center;
        }

        .info div {
            /*width: 100%;*/
        }

        .name {
            /*background: #4e4e4e;*/
            border-radius: 11px;
            text-align: initial;
            margin-top: 10px;
            /*height: 40px;*/
            /*line-height: 40px;*/
        }

        .info img {
            height: 2rem !important;
            width: 2rem !important;
            overflow: hidden !important;
            border-radius: 50% !important;
        }

        .info .name strong {
            font-size: 17px !important;
            color: #F1AC04 !important;
            font-weight: normal !important;
            margin-left: 13px;
        }

        .info .name em {

            /*border: 1px solid #f36b37 !important;*/
            width: 1.64rem !important;
            height: 0.6rem !important;
            padding: .05rem 0.3rem;
            color: #fff !important;

            border-radius: 0.2rem !important;
            /*background: none !important;*/
            background: linear-gradient(to bottom, #ffcc33, #ff8100);
        }

        .info .name small {
            font-size: .4rem !important;
            color: #F1AC04;
        }

        .userinfo {
            /*width: 100%;*/
            display: flex;
            margin: 0 auto;
            /*background: #F79700; */
            flex-wrap: wrap;
            border-radius: 8px;
            margin: 0 10px;
        }

        .userinfo div {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            /*background: #fff;*/
            color: #F1AC04;
            align-items: center;

        }

        .userinfo div div {

            width: 48%;
            display: flex;
            flex-wrap: wrap;
            height: 2.5rem;
            align-items: center;
            text-align: center;
            justify-content: center;
            margin: 5px 1%;
            /*background: #3ec4d0;*/
            border-radius: 20px;
            background: #fff;
            padding: 10px;
        }

        .userinfo div span {
            text-align: center;
            width: 100%;
            color: #F1AC04;
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
            top: 18%;
            background: #fff;
            padding: 5px;
            /*border: 1px solid #ccc;*/
        }

        div.chat img {
            width: 1rem;
            height: 1rem;
            margin: 7px;
        }

        .byj {
            height: 180px;
            width: 100%;
            /*background: #799ca6;*/
            position: absolute;
            top: 0;
            /*background-image: url('{{asset('pic/mybj.jpg')}}');*/
            /*background-size: 100% 100%;*/
        }

        .my-item-b {
            display: flex;
            font-size: 14px;
            FONT-VARIANT: JIS04;
            text-align: center;
            padding: 25px;
            border-bottom: 1px solid #ccc;
            width: 50%;
            align-items: center;
        }

        .my-item-b img {
            width: 45px;
        }

        .my-item-b div {
            color: #F1AC04;
            font-weight: bold;
            font-size: 14px;
        }

        .lli {
            height: 50px !important;
            width: 2px !important;
            background: #ffffff94 !important;
            margin: 0 !important;
        }

        .out-class {
            border-radius: 20px;
            width: 80%;
            /*height: 115px;*/
        }

        .out-class .layui-layer-btn {
            text-align: center;
        }

        .out-class a {
            border-radius: 10px;
        }

        .out-class a:nth-child(1) {
            background: #F79700;
            border-color: #F79700;
            margin-right: 20%;
        }

        .userinfo p {
            width: 100%;
            font-size: 22px;
            font-weight: 600;
            color: #F1AC04;
        }

        .userinfo p img {
            height: 30px;
            padding: 0 5px;
        }

        .userinfo p span {
            font-size: 20px;
            font-weight: 500;
            color: #F1AC04;
        }

        .main {
            overflow-y: auto;
        }

        .card {
            width: 95%;
            background-color: #808080;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            margin: 10px auto;
            color: #000000 !important; /* Changed to black */
        }

        .header2 {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 18px;
            color: #000000 !important; /* Changed to black */
        }

        .header2 img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .header2 div {
            flex: 1;
            color: #000000 !important; /* Changed to black */
        }

        .vip {
            display: flex;
            align-items: center;
            color: #000000 !important; /* Changed to black */
        }

        .vip img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }

        .balance2 {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
            color: #000000 !important; /* Changed to black */
        }

        .details {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #000000 !important; /* Changed to black */
        }
        .card {
            background-color: #F79700;
        }
        
        .my-item {
            color: #F1AC04;
        }
    </style>
</head>
<body style="font-size: 12px; color: #F1AC04;">
<div id="app">
    <div data-v-d5f15326="" class="main">
        <div class="card">
            <div class="header2"><img src="{{asset('pic/head1.jpg')}}" alt="Logo">
                <div>
                    <div style="color: #000000 !important;">ID: {{user()->phone}}</div>
                    <div class="vip" style="color: #000000 !important;"> </div>
                </div>
            </div>
            <div class="balance2"><span style="font-size:16px; color: #000000 !important;">Reacharge Balance</span><span
                    style="font-size: 18px; color: #000000 !important;">👁️</span><br>{{price(user()->balance)}}
            </div>
             <div class="balance2"><span style="font-size:16px; color: #000000 !important;">Withdraw Balance</span><span
                    style="font-size: 18px; color: #000000 !important;">👁️</span><br>{{price(user()->income)}}
            </div>
            <div class="details">
                <div style="color: #000000 !important;">Withdraw: {{price(\App\Models\Withdrawal::where('user_id', user()->id)->where('status', 'approved')->sum('amount'))}}</div>
                <div style="color: #000000 !important;">Recharge: {{price(\App\Models\Deposit::where('user_id', user()->id)->where('status', 'approved')->sum('amount'))}}</div>
            </div>
        </div>
        <div class="my-list">
            <div class="my-item" onclick="window.location.href=`{{route('ordered')}}`">
                <div><img src="https://img.icons8.com/material-rounded/24/business.png"></div>
                <div style="color: #F1AC04;">Ordered</div>
                <div><img src="{{asset('pic/icon/my-jt.png')}}" alt="" style="width: 10px;"></div>
            </div>
            <div class="my-item" onclick="window.location.href=`{{route('user.bank')}}`">
                <div><img src="{{asset('pic/icon/setting.png')}}"></div>
                <div style="color: #F1AC04;">Bank Settings</div>
                <div><img src="{{asset('pic/icon/my-jt.png')}}" alt="" style="width: 10px;"></div>
            </div>
            <div class="my-item" onclick="window.location.href=`{{route('user.change.password')}}`">
                <div><img src="https://img.icons8.com/ios-filled/50/password.png"></div>
                <div style="color: #F1AC04;">Password Settings</div>
                <div><img src="{{asset('pic/icon/my-jt.png')}}" alt="" style="width: 10px;"></div>
            </div>
            <div class="my-item" onclick="window.location.href=`{{route('history')}}`">
                <div><img src="{{asset('pic/icon/funding.png')}}"></div>
                <div style="color: #F1AC04;">Funding history</div>
                <div><img src="{{asset('pic/icon/my-jt.png')}}" alt="" style="width: 10px;"></div>
            </div>
            <div class="my-item" onclick="window.location.href=`{{route('recharge.history')}}`">
                <div><img src="{{asset('pic/icon/record.png')}}"></div>
                <div style="color: #F1AC04;">Recharge history</div>
                <div><img src="{{asset('pic/icon/my-jt.png')}}" alt="" style="width: 10px;"></div>
            </div>
            <div class="my-item" onclick="window.location.href=`{{route('withdraw.history')}}`" style="">
                <div><img src="{{asset('pic/icon/record.png')}}"></div>
                <div style="color: #F1AC04;">Withdraw history</div>
                <div><img src="{{asset('pic/icon/my-jt.png')}}" alt="" style="width: 10px;"></div>
            </div>
            <div>
            </div>
            <div class="my-item tabs_btn1">
                <div><img src="{{asset('pic/icon/exit.png')}}"></div>
                <div style="color: #F1AC04;">Sign out</div>
                <div><img src="{{asset('pic/icon/my-jt.png')}}" alt="" style="width: 10px;"></div>
            </div>
        </div>
        <style>
            .login_nav {
                padding-bottom: 0.56rem;
            }

            .login_nav li {
                border: none !important;
            }

            .login_nav .wrapper {
                display: flex;
                justify-content: center;
            }

            .login_nav .p {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 1.6rem;
                height: 1.6rem;
                border-radius: 0.4rem;
            }

            .login_nav .p1 {
                background: #347DFF;
            }

            .login_nav .p2 {
                background: #FA6633;
            }

            .login_nav .p3 {
                background: #891616;
            }

            .login_nav .p4 {
                background: #9CA0FA;
            }

            .login_nav .p5 {
                background: #75C07E;
            }

            .login_nav .p6 {
                background: #50CAEF;
            }

            .login_nav .p7 {
                background: #FA4115;
            }

            .login_nav .p8 {
                background: #2A3D70;
            }

            .LoginOut {
                margin-top: .4rem;
            }
            
            .my-item div {
                color: #F1AC04;
            }
        </style>
        @include('app.layout.manu')
    </div>
</div>
<style>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    display: flex;
    justify-content: center;
    align-items: center; /* Center vertically */
    z-index: 9999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

.modal-overlay.active {
    opacity: 1;
    pointer-events: auto;
}

.modal-box {
    background: #fff;
    border-radius: 10px;
    padding: 20px 30px;
    width: 360px;
    max-width: 90%;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    transform: translateY(-200px);
    animation: slideDown 0.4s forwards;
    margin-top: 0; /* Removed top margin */
}

@keyframes slideDown {
    to {
        transform: translateY(0);
    }
}

.modal-box .modal-text {
    font-size: 16px;
    color: #F1AC04;
    text-align: center;
    margin-bottom: 20px;
}

.modal-box .modal-buttons {
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

.modal-box .btn-yes {
    flex: 1;
    background: linear-gradient(135deg, #f1ac04, #ffb733);
    border: none;
    color: #fff;
    padding: 10px 0;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: filter 0.2s;
}

.modal-box .btn-yes:hover {
    filter: brightness(1.1);
}

.modal-box .btn-no {
    flex: 1;
    background: #f0f0f0;
    border: none;
    color: #444;
    padding: 10px 0;
    border-radius: 6px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
}

.modal-box .btn-no:hover {
    background: #e0e0e0;
}
</style>

<script>
$(function () {
    $('.footer li').eq(4).addClass("on");
    $(".qwerty").val("pxx");

    $('.tabs_btn1').click(function () {

        if ($('.modal-overlay').length === 0) {
            $('body').append(`
                <div class="modal-overlay">
                    <div class="modal-box">
                        <div class="modal-text">Are you sure to log out?</div>
                        <div class="modal-buttons">
                            <button class="btn-yes">Yes</button>
                            <button class="btn-no">No</button>
                        </div>
                    </div>
                </div>
            `);

            setTimeout(() => {
                $('.modal-overlay').addClass('active');
            }, 10);

            $('.btn-yes').click(function () {
                window.location.href = "{{route('logout')}}";
            });

            $('.btn-no').click(function () {
                $('.modal-overlay').removeClass('active');
                setTimeout(() => {
                    $('.modal-overlay').remove();
                }, 300);
            });
        }
    });
});
</script>


</body>
</html>
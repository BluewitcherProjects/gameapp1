<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <title>Withdrawal</title>
    <link rel="stylesheet" href="{{asset('static_new/css/public.css')}}">
    <link rel="stylesheet" href="{{asset('static_new/css/icon-font.css')}}">
    <script charset="utf-8" src="{{asset('static_new/js/jquery.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/dialog.min.js')}}"></script>
    <style>
        body {
            background-color: #f2f2f2;;
            margin-bottom: 65px;
        }

        .header {
            width: 100%;
            color: #464646 !important;
            position: fixed;
            top: 0;
            z-index: 99;
            position: relative;
            background: #fff;

        }


        .header > p {
            width: 96%;
            margin: 0 2%;
            height: 46px;
            line-height: 46px;
            text-align: center;
        }

        .my-meun {
            overflow: hidden;
            margin-right: 15px;
            margin-left: 15px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .my-meun > .meun-item {
            font-size: 15px;
            padding-right: 45px;
            position: relative;
            padding: 0 15px;
            height: 50px;
            background-color: #fff;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            /*background: #d3d6fe;*/
            background-color: rgba(239, 246, 255, 1);
        }

        .my-meun > .meun-item > .item-line {
            border-bottom: 1px solid rgba(0, 0, 0, .2)
        }

        .my-meun > .meun-item > .item-line > span {
            font-size: 15px;
            line-height: 50px;
            margin-left: 5px;
            color: #F79700;
        }

        .my-meun > .meun-item > .item-line > icon {
            color: #002d71;
            position: absolute;
            right: 15px;
            top: 17px;
        }

        .item-line > input {
            border: none;
            position: absolute;
            right: 15px;
            top: 10px;
            /*margin-top: 2px;*/
            text-align: right;
            font-size: 15px;
            /*background: #d3d6fe;*/
            /*border-block-color: #F79700;*/
            padding: 8px 5px;
            border-radius: 10px;
            /*color: #F79700;*/
        }

        .item-line > input:-moz-placeholder {
            color: grey;
            font-size: 14px;
            text-align: right;
        }

        .item-line > input::-moz-placeholder {
            color: grey;
            font-size: 14px;
            text-align: right;
        }

        .item-line > input:-ms-input-placeholder, textarea:-ms-input-placeholder {
            color: grey;
            font-size: 14px;
            text-align: right;
        }

        .item-line > input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
            color: grey;
            font-size: 14px;
            text-align: right;
        }

        .save-btn {
            background: linear-gradient(0deg, #F79700, #F79700);
            color: #fff;
            margin: 12px;
            height: 40px;
            border-radius: 5px;
            text-align: center;
            line-height: 40px;
            margin-top: 50px;
            box-shadow: -1px 5px 15px 0 #fff;
        }

        .money-bg {
            margin-right: 15px;
            margin-left: 15px;
            border-radius: 10px;
            margin-top: 10px;
            background-color: #fff;
            position: relative;
            /*background: #d3d6fe;*/
            border: 0.053333rem solid #F79700;
            padding-left: 20px;
            background-color: rgba(239, 246, 255, 1);
        }

        .money-bg > p {
            padding: 10px;
        }

        .money-bg > input {
            font-size: 20px;
            border: none;
            /*width: 100%;*/
            /*margin: 10px 10px 20px 50px;*/
            background: #d3d6fe00;
            padding: 18px 10px;
        }

        .money-bg > span {
            position: absolute;
            left: 20px;
            bottom: 55px;
            font-size: 22px;
        }

        .balance {
            color: #000;
            font-size: 12px;
        }

        .rate {
            font-size: 14px;
            padding: 4px 7px;
            border-radius: 2500px;
            color: #002d71;
            margin-left: 17px;
            background: #fff;
        }

        .right {
            float: right;
        }

        #app {
            /*background: url(/{{asset('pic/backurl.jpg')}} no-repeat;*/
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            background-size: 100% 100%;
            /*background: #F79700;*/
        }

        .dialog-content {
            background-color: #F79700 !important;
            background: #F79700 !important;
        }

        .tbj {
            background-image: url('{{asset('pic/deposit-bj.png')}}') !important;
            background-size: 100% 100%;
            width: 100%;
            height: 380px;
            margin-top: -46px;
        }

        .tbj-div {
            padding: 120px 20px;
            color: #fff;

        }

        .tbj-div p {
            padding-bottom: 15px;
        }

        #login-form {
            background: #fff;
            border-radius: 20px;
            margin-top: -123px;
            padding: 20px 0;
        }

        .money-bg font {
            color: red;
        }
    </style>
    <link rel="stylesheet" href="{{asset('static_new/css/theme.css')}}">

    <style id="dialog-body-no-scroll">.body-no-scroll {
            position: absolute;
            overflow: hidden;
            width: 100%;
        }</style>
</head>
<body id="app">
<div class="header" style="background:#00008e00;">
    <div class="goback" style="color: #fff!important"><span class="icon iconfont icon-fanhui "
                                                            onclick="window.location.href='{{route('dashboard')}}'"></span><a
            href="javascript:history.go(-1)" style="color: #fff!important"></a></div>
    <p style="color: #fff!important">Withdrawal</p></div>
<div class="tbj">
    <div class="tbj-div"><p><span>Balance</span><span class="rate" style="color: #F79700">Tax {{setting('withdraw_charge')}}%</span></p>
        <p style="font-size: 30px;font-weight: 600;">{{price(user()->income)}}</p>
        <p style="color:rgb(149 195 255);" onclick="tixianAll(`{{user()->balance}}`)">Withdraw all</p></div>
</div>
<form id="login-form" method="post" action="{{route('user.withdraw.request')}}">@csrf
    <div class="money-bg"><font>{{currency()}}</font><input name="amount" id="num" type="number" placeholder="Amount"></div>
    <div class="my-meun">
        <div class="meun-item">
            <div class="item-line"><span>Phone number:</span><input type="text" value="{{user()->phone}}"
                                                                    placeholder="Enter phone number" name="mobile"
                                                                    autocomplete="off"></div>
        </div>
        <div class="meun-item">
            <div class="item-line"><span>Bank Account:</span><input type="text" value="{{user()->gateway_number}}" name="bank_account"
                                                                    autocomplete="off" readonly="">
            </div>
        </div>
        <div class="meun-item">
            <div class="item-line"><span>Bank name:</span><input type="text" value="{{user()->bank_name}}" name="back_name"
                                                                 autocomplete="off" readonly=""></div>
        </div>
    </div>
    <div class="save-btn" style="
    margin-top: 20px;border-radius:unset;
">Confirm</div>
    <div class="money-bg" style="border: none;font-size: 15px;"><p style="">*Minimum withdrawal amount: {{price(setting('minimum_withdraw'))}}</p>
        <p style="">*Withdrawal time: 00:00 - 00:00 (normal withdrawal on weekends)</p>
        <p style="">*Arrival time: 10 minutes - 24 hours (subject to bank transfer time)</p></div>
    <input type="hidden" name="type" value="card">
</form>
<style>
    .dialog-content {
        background: #070807 !important;
    }
</style>
@include('alert-message')
<script type="application/javascript">
    @if(session()->has('error'))
        message('{{session()->get('error')}}')
    @endif
    @if(session()->has('success'))
        message('{{session()->get('success')}}')
    @endif

    var flag = true;
    var countdown = 60;

    function check_phone() {
        if ($("input[name=mobile]").val() == '') {
            message('Phone number')
            return false;
        }
        return true;
    }

    function tixianAll(price) {
        $('#num').val(price);
    }

    var tixian_type = "1";
    $(function () {

        /*点击登录*/
        $(".save-btn").on('click', function () {

            if ($("input[name=amount]").val() == '') {
                message('Enter the amount')
                return false;
            }

            document.querySelector('#login-form').submit();
        })
    })


</script>
</body>
</html>

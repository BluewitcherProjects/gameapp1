<html data-dpr="1" style="font-size: 37.5px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <title>Recharge</title>
    <link href="{{asset('static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css')}}" rel="stylesheet">
    <script charset="utf-8" src="{{asset('static_new/js/jquery.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/dialog.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/common.js')}}"></script>
    <link rel="stylesheet" href="{{asset('static_new/css/theme.css')}}">
    <link href="{{asset('static_new6/layui/layui.css')}}" rel="stylesheet">
    <script src="{{asset('static_new6/layui/layui.js')}}"></script>
    <link id="layuicss-laydate" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/laydate/default/laydate.css?v=5.3.1')}}"
          media="all">
    <link id="layuicss-layer" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/layer/default/layer.css?v=3.5.1')}}" media="all">
    <link id="layuicss-skincodecss" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/code.css?v=2')}}" media="all">
    <link rel="stylesheet" href="{{asset('static_new/css/public.css')}}">
    <link rel="stylesheet" href="{{asset('static_new/css/icon-font.css')}}">
    <style type="text/css" title="fading circle style">
        .circle-color-8 > div::before {
            background-color: #ccc;
        }

        .header {
            width: 100%;
            color: #464646 !important;
            position: fixed;
            top: 0;
            z-index: 99;
            position: relative;
            background: #fff;
            font-size: 20px;
        }

        .header > p {
            width: 96%;
            margin: 0 2%;
            height: 46px;
            line-height: 46px;
            text-align: center;
        }

        .save-btn {
            background: linear-gradient(0deg, #F79700, #F79700);
            color: #fff;
            margin: 12px 0;
            height: 40px;
            border-radius: 20px;
            text-align: center;
            line-height: 40px;
            margin-top: 50px;
            width: 100%;
        }

        .vi1 {
            border: 2px #0b7420 solid;
            width: 100%;
            text-align: center;
            padding: 5px;
            font-size: 16px;
            margin-top: 10px;
        }

        .Cash_num_password .col-xs-3[data-v-7d87b156] {
            border: 0.013333rem solid #F79700;
            margin: 0.066667rem 1.65%;
            color: #F79700;
            padding: 0.4rem 0;
            width: 30%;
            line-height: 0.426667rem;
            text-align: center;
            /*color: #d91d37;*/
            background: #fff;
            float: left;
            font-weight: 600;
            font-size: 16px;
            border-radius: 15px;
        }

        .main[data-v-7d87b156] {
            padding: 0;
            padding-top: 0;
        }

        .Cash_num[data-v-7d87b156] {
            margin-top: -153px;
            position: relative;
            border-radius: 20px;
        }

        .main[data-v-7d87b156] {
            background: #fff;
        }

        .Cash_num_money input[data-v-7d87b156] {
            font-size: 15px;
        }

        .recharge_b {
            background: url('{{asset('pic/chongzhi.png')}}');
            background-size: 100% 100%;
            margin-top: -46px;
            position: relative;
        }

        .Cash_num_money[data-v-7d87b156] {
            border: 1px solid #F79700;
            margin: 7px;
            border-radius: 10px;
        }

        .Cash_num_money[data-v-7d87b156] span {
            padding: 0 10px;
            font-size: 20px;
        }

        .Cash_num_money[data-v-7d87b156], .Cash_num_money[data-v-7d87b156] input {
            background-color: rgba(239, 246, 255, 1);
        }

        .Cash_num_money[data-v-7d87b156] input {
            font-size: 17px;
            color: #F79700;
        }

        .xz {
            background: #F79700 !important;
            color: #fff !important;
        }
        select#channel {
            width: 100%;
            padding: 15px 10px;
        }
    </style>
</head>
<body style="font-size: 12px;">
<div id="app">
    <div data-v-7d87b156="" class="main">
        <div class="header" style="background: #0b742000;">
            <div class="goback" style="color: #000!important"><span class="icon iconfont icon-fanhui" style="
                font-size: 20px;
            " onclick="window.history.back(-1)"></span><a href="javascript:history.go(-1)"
                                                          style="color: #000!important"></a></div>
            <p style="color: #000!important">Recharge</p></div>
        <div class="recharge_b"
             style="height: 380px;text-align: center;line-height: 80px;font-size: 16px;color: #0b7420;padding: 0 20px;display: flex;align-items: center;">
            <div style="color: #fff;text-align: left;margin-top: -69px;"><p style="line-height: 0px;">Account
                    balance</p>
                <p style="font-size: 33px;font-weight: 600;">{{price(user()->balance)}}</p></div>
        </div>
       <form id="depositForm" method="POST" action="/services/deposit.php">  <!-- default action ch1 -->
  @csrf
  <input type="hidden" name="user" value="{{ auth()->user()->phone }}">
  <div data-v-7d87b156="" class="Cash_num main2">
    <h3 data-v-7d87b156="" style="text-align: center;font-size: 20px;color: #F79700;height: 39px;">
      Select amount
    </h3>
    <div>
      <div data-v-7d87b156="" class="Cash_num_password">
        <span data-v-7d87b156="" class="col-xs-3">580</span>
        <span data-v-7d87b156="" class="col-xs-3">1870</span>
        <span data-v-7d87b156="" class="col-xs-3">5610</span>
        <span data-v-7d87b156="" class="col-xs-3">4600</span>
        <span data-v-7d87b156="" class="col-xs-3">14025</span>
        <span data-v-7d87b156="" class="col-xs-3">25590</span>
        <span data-v-7d87b156="" class="col-xs-3">65000</span>
        <span data-v-7d87b156="" class="col-xs-3">1000</span>
        <span data-v-7d87b156="" class="col-xs-3">2500</span>
      </div>
    </div>
   <div data-v-7d87b156="" class="Cash_num_money">
  <span data-v-7d87b156="">{{currency()}}</span>
  <input data-v-7d87b156="" name="amount" id="amountInput" type="text" placeholder="Please enter the amount">
</div>

<div data-v-7d87b156="" class="Cash_num_money">
  <select name="channel" id="channel">
    <option value="ch1">WPP-CH1</option>
    <option value="ch2">WPP-CH2</option>
  </select>
</div>

<button 
  data-v-7d87b156="" 
  class="save-btn save-btn2 submit" 
  style="font-size:20px;margin-top:10px;border-radius: unset"
  id="rechargeBtn"
>
  Recharge
</button>

<div id="minAmountMessage" style="display:none; text-align:center; margin:20px auto; color:red; font-weight:bold;">
  Minimum recharge amount is ₹580
</div>

<div style="background-color: rgba(239, 246, 255, 1);margin: 10px;padding: 10px;border-radius: 10px;color: #F79700;">
  <h4 data-v-7d87b156="">Charging rules</h4>
  <h4 data-v-7d87b156="">1.Minimum top-up ₹580 </h4>
  <h4 data-v-7d87b156="">2. Please pay and submit UTR within the stipulated time.</h4>
  <h4 data-v-7d87b156="">3. Do not save old accounts top-up.</h4>
</div>
</div>
</form>

@include('alert-message')

<script type="application/javascript">
  $(function () {
    $('.Cash_num_password span').click(function () {
      var tt = $(this).text();
      tt = tt.replace('Tk', '').trim();
      $("input[name=amount]").val(tt);
      $('.Cash_num_password span').removeClass('xz');
      $(this).addClass('xz');
    });

    $('#channel').change(function () {
      var selectedChannel = $(this).val();
      var formAction = '';
      if (selectedChannel === 'ch1') {
        formAction = '/services/deposit.php';
      } else if (selectedChannel === 'ch2') {
        formAction = '/services/deposit.php';
      }
      $('#depositForm').attr('action', formAction);
    });

    var initialChannel = $('#channel').val();
    if (initialChannel === 'ch1') {
      $('#depositForm').attr('action', '/services/deposit.php');
    } else if (initialChannel === 'ch2') {
      $('#depositForm').attr('action', '/services/deposit.php');
    }

    $('#rechargeBtn').click(function (e) {
      var amount = parseFloat($('#amountInput').val());
      if (isNaN(amount) || amount < 580) {
        e.preventDefault(); 
        $('#minAmountMessage').fadeIn();
        setTimeout(function () {
          $('#minAmountMessage').fadeOut();
        }, 3000);
      }
    });
  })
</script>

</body>
</html>

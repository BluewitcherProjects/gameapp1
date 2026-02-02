<html>
<head>
    <meta charset="utf-8">
    <title>Promotion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('static_new/style.css')}}">
    <script src="{{asset('static_new/js/jquery.min.js')}}"></script>
    <link href="{{asset('static_new6/layui/layui.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static_new6/css/new.css')}}">
    <script src="{{asset('static_new6/layui/layui.js')}}"></script>
    <link id="layuicss-laydate" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/laydate/default/laydate.css?v=5.3.1')}}"
          media="all">
    <link id="layuicss-layer" rel="stylesheet"
          href="{{asset('static_new6/layui/css/modules/layer/default/layer.css?v=3.5.1')}}" media="all">
    <style>
        #qrcode {
            margin: 0rem auto;
        }

        #qrcode canvas {
            padding: 8px;
            border: 2px solid #000;
            background: #fff;
            border-radius: 14px;
        }

        .poster-link {
            border: 2px solid #F79700;
            background: #fff;
        }

        .poster-content {
            /*background: url('{{asset('pic/invite.jpg')}}');*/
            background-size: 100% 100%;
        }

        .top-poster {
            background: none;
        }

        .rbtn-copy {
            width: 100%;
            height: 36px;
            margin: 10px 0;
            border-radius: 20px;
        }
        
        .navbar-box {
            background: #F1AC04 !important;
        }
    </style>
</head>
<body style="background-color: #fff;width: 100%;">
<div class="navbar-box" style="background: #F1AC04;">
    <div class="navbar-back" onclick="javascript:history.go(-1)"><img src="{{asset('pic/back.png')}}" alt=""
                                                                      class="navbar-ico"></div>
    <h1 class="navbar-title">Invite friends</h1></div>
<div class="poster-content">
    <div class="top-poster"></div>
    <div class="poster-ques" style="padding: 0;">
        <div class="poster-link" style="width:100%;padding: 0;display: none;"><img src="{{asset('pic/invite.jpg')}}"
                                                                                   style="width:100%;"></div>
    </div>
    <div class="poster-chat">
        <div class="chatbox1"
             style="margin-bottom: 20px;margin-top: 29px;background: #fff;padding: 15px;border-radius: 20px;color: #F79700;">
            <div style="padding: 3px 20px;color:#F79700;border-radius: 20px;"><img src="{{asset('pic/icon/invite1.png')}}"
                                                                                   style="float: left;width: 35px;"><img
                    src="{{asset('pic/icon/invite2.png')}}" style="width: 35px;"><img src="{{asset('pic/icon/invite3.png')}}"
                                                                         style="float: right;width: 35px;"></div>
            <div><span style="float: left;">  LV1 =20%</span><span style=""> LV2 =3%</span><span style="float: right;"> LV3 =1%</span>
            </div>
        </div>
    </div>
    <div style="width: 100%;background: #fff;border-radius: 20px;padding: 20px;padding-bottom: 100px;color: #F79700;">
        <img src="{{asset('pic/invite23.jpg')}}">
        <div style="padding: 0 10px;"><p style="display: flex;"><span
                    style="display: block;width: 50%;font-size: 26px;font-weight: 600;border-right: 2px solid;">Referral link</span><span
                    style="display: block;width: 50%;overflow: hidden;padding-left:15px;">{{url('account/register').'?inviteCode='.auth()->user()->ref_id}}</span>
            </p>
            <p>
                <button style="background:#F79700;" class="rbtn-copy"
                        onclick="copy_txt('{{url('account/register').'?inviteCode='.auth()->user()->ref_id}}')">COPY
                </button>
            </p>
        </div>
        <div style="border-radius: 20px;background: url('{{asset('pic/invite3.jpg')}}');background-size: 100% 100%;padding: 20px 10px;text-align: center;">
            <div id="qrcode">
                <img style="width: 60%" src="https://cdn.pixabay.com/photo/2013/07/12/14/45/qr-code-148732_640.png" alt="">
            </div>
            <p style="padding: 10px;"><span
                    style="font-size: 20px;;font-weight: 600;border-right: 2px solid;padding:0 15px;">Referrer lD</span><span
                    style="font-size: 20px;overflow: hidden;padding:0 15px;">{{user()->ref_id}}</span></p>
            <p>
                <button style="background:#F79700;" class="rbtn-copy" onclick="copy_txt('{{user()->ref_id}}')">COPY</button>
            </p>
        </div>
    </div>
</div>
@include('app.layout.manu')
<input name="" id="webcopyinput" type="text"
       style="color: #FF0000; font-size: 20px; width: 1px; height: 1px; border: hidden; font-weight: bold; text-align: center;"
       value="">
<link href="{{asset('static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('static_new/css/public.css')}}">
<script charset="utf-8" src="{{asset('static_new/js/jquery.min.js')}}"></script>
<script charset="utf-8" src="{{asset('static_new/js/dialog.min.js')}}"></script>
<script charset="utf-8" src="{{asset('static_new/js/common.js')}}"></script>
<link href="{{asset('static_new6/layui/layui.css')}}" rel="stylesheet">
<script src="{{asset('static_new6/layui/layui.js')}}"></script>
<link id="layuicss-layer" rel="stylesheet" href="{{asset('static_new6/layui/css/modules/layer/default/layer.css')}}" media="all">
{{--@include('alert-message')--}}
<script>

    function copy_txt(text) {
        var loading = null;
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();

        loading = $(document).dialog({
            type: 'notice',
            infoIcon: '{{asset('static_new/img/loading.gif')}}',
            infoText: 'Loading',
            autoClose: 0
        });

        setTimeout(function (){
            loading.close();
            $(document).dialog({infoText: 'copy successfully'});
        }, 500)

    }
</script>
</body>
</html>
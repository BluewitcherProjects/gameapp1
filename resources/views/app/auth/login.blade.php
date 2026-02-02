<html data-dpr="1" style="font-size: 37.5px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <title>Login</title>
    <link href="{{asset('static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static_new/css/public.css')}}">
    <script charset="utf-8" src="{{asset('static_new/js/jquery.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/dialog.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/common.js')}}"></script>
    <link href="{{asset('static_new6/layui/layui.css')}}" rel="stylesheet">
    <script src="{{asset('static_new6/layui/layui.js')}}"></script>
    <link id="layuicss-layer" rel="stylesheet" href="{{asset('static_new6/layui/css/modules/layer/default/layer.css')}}" media="all">
    <style type="text/css" title="fading circle style">
        .circle-color-23 > div::before {
            background-color: #ccc;
        }

        #app {
            /*background: url(/pic/login1.jpg);*/
            background-size: cover;
            background-repeat: no-repeat;
            /*min-height: 640px;*/
            min-height: 110vh;
            background-size: 100% 100%;
            background-color: #fff;
        }

        .main {
            height: 10.666667rem;
            position: auto;
            height: 100%;
            width: 100%;
            /*margin-top: -1.2rem;*/
            background-repeat: no-repeat;
            background-size: 100% auto;
            -moz-background-size: 100% auto;
            /*background-color: #61b152; */
            /*padding-top: 2.933333rem;*/
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
            top: 45%;
            background: #fff;
            padding: 5px;
            /*border: 1px solid #ccc;*/
        }

        div.chat img {
            width: 1rem;
            height: 1rem;
            margin: 7px;
        }

        #app {
            /*background-image: url('/pic/login_bj.jpg');*/
            background-size: 70% 600%;
            background: #fff;
        }

        .main {
            /*background-image: url('/pic/login_bj2.jpg');*/
            background-size: 75% 75%;
        }

        .box[data-v-c38e8882] {
            margin: 0 auto;
            position: relative;
            z-index: 999;
            border-radius: 0;
            padding: 0.4rem;
            padding-top: 0.666667rem;
            margin-top: 0.266667rem;
            background: #fff;
            box-shadow: #ccc 2px 3px;
            width: 95%;
        }

        .box ul li[data-v-c38e8882] {
            overflow: hidden;
            position: relative;
            padding-bottom: 0.066667rem;
            margin: 20px 0;
            box-shadow: 0px 2px 18px 0px rgba(0, 0, 0, 0.16);
            border-radius: 5px;
            height: 60px;
            border: 2px solid #F79700;
        }
    </style>
</head>
<body style="font-size: 12px;padding: 0">
<div id="app"><!--en-us-->
    <div data-v-c38e88821="" class="main"><!-- 头部图片 -->
        <div style="width: 100%;height: 100px;margin-top:0rem;">
            <div align="center"><img src="https://www.pedigree.in/files/styles/webp/public/2024-03/2_new.jpg.webp?VersionId=xGMRd0xnc43mdlZt5YrMYKywHDBaPOfr&itok=Ulu2Tcia" alt="" style="width: 100%;"></div>
            <div data-v-c38e8882="" class="p3" style="margin-top:.5rem;"><p data-v-c38e8882=""></p>
                <div data-v-c38e8882="" class="title">
                    <div data-v-c38e8882="" class="line"></div>
                </div>
            </div>
            <div data-v-c38e8882="" class="box" style="margin-top:-1.8rem;">
                <ul data-v-c38e8882="" style=" clear: both;margin-top:0.5rem;"><label>Mobile number</label>
                    <li data-v-c38e8882=""><input
                            data-v-c38e8882="" type="text" name="tel" style="padding-left: 15px;" placeholder="Mobile number" value=""></li>
                    <label>Login password</label>
                    <li data-v-c38e8882=""><input
                            data-v-c38e8882="" type="password" name="pwd" style="padding-left: 15px;" placeholder="Login password" value=""></li>
                    <li data-v-c38e8882="" style="display: none;"><img data-v-c38e8882=""
                                                                       src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAXCAYAAAARIY8tAAACsklEQVRIibVVS08TURT+pjNtoQHqBggmBSMmgEFxw4aoBIkLX0FNDHGhgDsVjKgbY2IwujL4C3ShC03EFTEuqCsUbfG54OEKE5AWWzogpZ22M5053k4hQrxT6oMvucm9d86c75xzv3uuQAzYRNg20/mfEeg6Fu/1Q75xHRSL/T8CSqWQfP0K3zvOQI9EYCsqRqirA4rXC1pe3pBA4J2BHgxCnZlB6v0oksPDECsqUHyqHY7GRgg2G9SxMUSfPEb66xQK9u5DYVMTRI8Hdk9lfgTBo4chMWPnrnq4Wg9CqvRAcDgBUVyJQIfBMjPm5xF/6YX6+RM0FtDW5y84JeAg0HaM9HicmBMiXeeZZGEYZCSTZCgKsbJxTSRu4ViEgt1ujtwFFiA4neY0vbDINeEeslReDkOWc/qOPRvAMhsZsAwgiHy9cHfF7dXmQVshHZjF0oP7cNbUmGs9HIbEhJA3gb2qCsrbN+ZcCwSQHBlZ933+2lVsudwLe22duVYnJiBV78ifwFG3E9rUlDnPXKqF/rtI+H3mOnSuC46aWrgOtDJlOVYIxuCsr+enyxVHIkGBI4eyc1WlxOioqazwpW4KnjxBaVleZz93up3S4RBXRVyCDCJ9N0kZGsqSaBol/H6abWkmpvd1dsnxcQpdOG8pZ0sCxe+jcE/3rw1Gok1Pm9pfC/nObYoNDlq5IcteVNCwB6SmWLt4l92QJHa7Pab2V5H+xtrJ5ARcLS1WbvhnsIrExw8UZPW1QrjnIsW9Q7lcWGdgZrG7AUVtxxG50vvbN/lWH6SqbSjc35zLBb/ZrYURjSI28BSpL5Nwn+2E4HIh+ughBLcb7o5OiGVl/0aQgf5jESmfDwpr3dA0OFl7drHIxdLSjX7NjyCDzMNjLC2BqQi2khLYWCb5IG+Cv8WmP/o/AeVjj8bEawqWAAAAAElFTkSuQmCC"
                                                                       alt="" class="lco"><input data-v-c38e8882=""
                                                                                                 type="text"
                                                                                                 placeholder=""><img
                            data-v-c38e8882=""
                            src="data:image/png;base64,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"
                            alt="" class="code"></li>
                </ul>
                <div data-v-c38e8882="" style="margin-top: 20px;">
                    <button data-v-c38e8882="" class="login" style="    font-size: 20px;
    background: #F79700;
    border-radius: 5px;
    height: 60px;
    border: 2px solid #F79700;
    color: #fff;">Login
                    </button>
                </div>
                <div data-v-c38e8882="" style="
            margin-top: 5px;
        ">
                    <div data-v-c38e8882="" class="col-xs-4"
                         onclick="window.location.href=`https://t.me/TNL_LAB_WEBSITE_DEVELOPER`"
                         style="padding: 0px;float: right;color: #000"><p data-v-c38e8882=""
                                                                          style="color:#F79700;font-size: 16px;font-weight: 700;">
                            Online</p></div>
                    <div data-v-c38e8882="" class="col-xs-4" onclick="window.location.href=`{{url('account/register')}}`"
                         style="padding: 0px;color:#000"><p data-v-c38e8882=""
                                                            style="color:#F79700;font-size: 16px;font-weight: 700;">
                            Register</p></div>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('alert-message')
    <script>
        $(function () {
            $(".login").on('click', function () {
                var loading = null;
                var tel = $("input[name=tel]").val();
                var pwd = $("input[name=pwd]").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('login')}}",
                    data: {phone: tel, password: pwd},
                    type: 'POST',
                    beforeSend: function () {
                        message('Loading...')
                    },
                    success: function (data) {
                        message(data.message)
                        if (data.status == true) {
                            setTimeout(function () {
                                location.href = "{{url('dashboard')}}"
                            }, 2000);
                        }
                    }
                });
            })
        })
    </script>
</div>
</body>
</html>

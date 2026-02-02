<html data-dpr="1" style="font-size: 37.5px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <title>Register</title>
    <link href="{{asset('static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static_new/css/public.css')}}">
    <script charset="utf-8" src="{{asset('static_new/js/jquery.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/dialog.min.js')}}"></script>
    <script charset="utf-8" src="{{asset('static_new/js/common.js')}}"></script>
    <style type="text/css" title="fading circle style">
        .circle-color-23 > div::before {
            background-color: #ccc;
        }

        .main {

            /*padding-bottom: 1rem;*/

        }

        .box {
            /*padding-bottom: 20rem;*/
        }

        .fa {
            width: 85px !important;
            display: inline-block;
            background: red;
            padding: 3px 5px;
            border-radius: 5px;
            color: #fff;
        }

        .form-buttom2 {
            width: 100%;
            background: #ec0022;
            box-shadow: 0 0 0.013333rem #9b9a9a;
            border-radius: .533333rem;
            height: 1.066667rem;
            font-size: .48rem;
            color: #fff;
            display: block;
            line-height: 40px;
            text-align: center;
        }

        .wxtip {
            background: rgba(0, 0, 0, 0.8);
            text-align: center;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 999999992;
            display: none;
        }

        .imgs {
            background: url('{{asset('static_new6/img/gw_live_weixin.png')}}') no-repeat;
            background-size: auto;
            background-size: 100% 110%;
            z-index: 999999;
            min-height: 100%;
            background-size: contain;
            width: 100%;
        }

        .get-code {
            display: flex;
            justify-content: center;
        }

        .box ul li input[data-v-79134734]::placeholder {
            font-size: 12px !important;
            color: #F79700;
            font-weight: 400;

        }

        #app {
            background: #fff;
            /*background-image: url('/pic/register_bj.jpg');*/
            background-size: 100% 100%;
            overflow-y: auto;
        }

        .main {
            /*background: url('/pic/register_bj2.jpg');*/
            background-size: 105% 111%;
        }

        html, body, #app {
            height: 100%;
            width: 100%;
            position: fixed;
        }

        .box ul li[data-v-79134734] {
            overflow: hidden;
            position: relative;
            /* border: 0.026667rem solid #eee; */
            /* border-radius: 0.533333rem; */
            margin-bottom: 11px;
            background: #f3f3f3;
            /* border-color: #F79700; */
            box-shadow: 0px 2px 18px 0px rgba(0, 0, 0, 0.16);
            border-radius: 0px;
            height: 52px;
            width: 100%;
            min-width: 285px;
        }

        .box[data-v-79134734] {
            /* margin: 0 20px; */
            padding: 20px;
            position: relative;
            z-index: 0;
            border-radius: 0.266667rem;
            /* background-color: #fff; */
            /* padding: 0.4rem; */
            /* box-shadow: 0 0.053333rem 0.533333rem 0.053333rem #dfdfdf; */
            margin-top: 0rem;
            width: 100%;
        }

        .box ul li input[data-v-79134734] {
            float: left;
            width: 100%;
            height: 1.066667rem;
            /* border-radius: 0.533333rem; */
            padding: 0 0.4rem;
            font-size: 0.373333rem;
            /*background: #f3f3f3;*/
            border: none;
            border: 1px solid #afafaf;
            outline: none;
            height: 100%;
        }

        li[data-v-79134734].red-placeholder input[data-v-79134734]::placeholder {
            color: red;
        !important
        }

        .box div button[data-v-79134734] {
            width: 100%;
            background: #fff;
            /* box-shadow: 0 0 0.013333rem #9b9a9a; */
            /* border-radius: 0.533333rem; */
            height: 1.066667rem;
            font-size: 0.48rem;
            color: #fff;
            height: 52px;
            width: 80%;
            min-width: 285px;
            background: #F79700;
            border-radius: 14px;
            border: 2px solid #F79700;
        }
        .box[data-v-79134734] {
            margin: auto;
            padding: 20px;
            position: relative;
            z-index: 0;
            border-radius: 0 !important;
            background-color: #fff !important;
            /* padding: 0.4rem; */
            /* box-shadow: 0 0.053333rem 0.533333rem 0.053333rem #dfdfdf; */
            margin-top: -1rem;
            width: 96%;
        }
    </style>
</head>
<body style="font-size: 12px;padding-top: 0;">
<div id="app">
    <div data-v-79134734="" class="main" style=""><!--  头部图片 -->
        <div style="text-align: left;"><img src="https://www.pedigree.in/files/styles/webp/public/2024-03/2_new.jpg.webp?VersionId=xGMRd0xnc43mdlZt5YrMYKywHDBaPOfr&itok=Ulu2Tcia" alt="" style="
    width: 100%;
">
        </div>
        <div style="flex: 1;display: flex;align-items: center;padding-bottom: 134px;    width: 100%;">
            <div data-v-79134734="" class="box">
                <form action="{{url('register')}}" id="forgetpwd-form" method="post">@csrf
                    <ul data-v-79134734="">
                        <li style="margin: 0.266667rem;">
                            <div
                                style="padding: 6px 8px;
    background: #F79700;
    width: 91px;
    font-size: 18px;
    color: #fff;
    border-radius: 0;
    text-align: center;"
                                onclick="window.location.href=`{{url('login')}}`">
                                Log in
                            </div>
                        </li>
                        <label>Mobile</label>
                        <li data-v-79134734=""><span></span><input class="aaa" data-v-79134734="" type="text"
                                                                      name="phone" placeholder="Phone number"
                                                                      style="padding-left: 15px;"></li>
                        <label>Password</label>
                        <li data-v-79134734=""><input data-v-79134734="" placeholder="Please enter login password"
                                                      name="password" type="password"><img data-v-79134734=""
                                                                                      src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkZGODBCNzE0NkFGNTExRTlCOTMzRTFGMEZEMjg1N0U2IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkZGODBCNzE1NkFGNTExRTlCOTMzRTFGMEZEMjg1N0U2Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RkY4MEI3MTI2QUY1MTFFOUI5MzNFMUYwRkQyODU3RTYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RkY4MEI3MTM2QUY1MTFFOUI5MzNFMUYwRkQyODU3RTYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5Zo3XTAAADHElEQVR42uyZXUhUQRTH7123QEqspChIn6y2CEKifKhAoodedmsfIiqKsmgpoi8Swoegb3opqaDWggqDYiULlkCwVl8kwofIwkKWMouKIslUrNW6/Q+chWG6e7mr3ZXsHPgzc2dmZ+Y3d+bM2V3TsixjPJjPGCcmIAIiIAIiIAIiIAIiIALy/4D47Qqj0doyJBegYugsdPHuy/jPsZjg5tIKX7+/YDeyVdBHaG8ksvOxKxDYFWgx52ugXuj6WIAAYj3PIQ8qga5BC9xurZna8+FwIFiSa4hwIDQDSTVDZJqbI8gJ7XkedBMwE3MFsWZ+GLvFuoXsQq3quGsQnIfLSJq14hVQPWDycuKFrOEbSFZqxa3Fg1012XqtrVC3VhaCGgAzzbvtFCyEYshu1Ko+QVvOv3lmZQWCt0IQO6ABG5gEBqvwAGI5kofQOq1qiOaCOb0a0T2CDzYh2Qb90KoWQTEMfGptIDTrbxxq9HUM2TuKt0wbuf3tmEvcqQ/T7net1QeC+kpRQW0Gj/Eaug1dnTzc11WXbPmVxf1AnrAS2gCV2jT7Au0CRL1a2HguPjIQhinT7hfVqJMeqA1qgZ5CndBXrd0UaC6/UdqaSyA6b6ZNn9RHBBB/XH52IH63rx8dPgHMKmQP0u0KFaoLAhXRGrBoO6Sgz5ySkeuezqmT5+vlBTuNMXtGFaI4wNAKHwEQucVlDk1povl8E2drbRinyvOgERCHkCzVirttHIIbG2K3qlo5xqj0FAQDzOGQYYJSnISC7PcvQQ+gF1CfTRcDXJeg2BTaRN1yMJi2AoosMNbsUUe/DhaApmpl1dgK7Ujb+bKkM0CTKOcIukjxQPugR9B7fOa7skBHeRHSRg6A3Po7r7ZWsxYFR3XXiOcUX1yt0KD6NizDTFCdCqGERHVqv+y1DK8Oez9Wbz+ycd7fTQ7N6V6YpG4Z07AoAPyQof0e6B5lUr78xvsdsZSXW4tgyD02uGia5DOR3or0Ft469PvNZb+5/arLsdpJ6Dkf8DO4+Tu9Gs+Uv94EREAEREAEREAEREAERED+NfstwAAy2fUNiniqRQAAAABJRU5ErkJggg=="
                                                                                      alt="" class="eye"></li>
                        <label>Confirm Password</label>
                        <li data-v-79134734=""><input data-v-79134734="" placeholder="Please confirm the login password"
                                                      name="confirm_password" type="password"><img data-v-79134734=""
                                                                                              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkZGODBCNzE0NkFGNTExRTlCOTMzRTFGMEZEMjg1N0U2IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkZGODBCNzE1NkFGNTExRTlCOTMzRTFGMEZEMjg1N0U2Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RkY4MEI3MTI2QUY1MTFFOUI5MzNFMUYwRkQyODU3RTYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RkY4MEI3MTM2QUY1MTFFOUI5MzNFMUYwRkQyODU3RTYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5Zo3XTAAADHElEQVR42uyZXUhUQRTH7123QEqspChIn6y2CEKifKhAoodedmsfIiqKsmgpoi8Swoegb3opqaDWggqDYiULlkCwVl8kwofIwkKWMouKIslUrNW6/Q+chWG6e7mr3ZXsHPgzc2dmZ+Y3d+bM2V3TsixjPJjPGCcmIAIiIAIiIAIiIAIiIALy/4D47Qqj0doyJBegYugsdPHuy/jPsZjg5tIKX7+/YDeyVdBHaG8ksvOxKxDYFWgx52ugXuj6WIAAYj3PIQ8qga5BC9xurZna8+FwIFiSa4hwIDQDSTVDZJqbI8gJ7XkedBMwE3MFsWZ+GLvFuoXsQq3quGsQnIfLSJq14hVQPWDycuKFrOEbSFZqxa3Fg1012XqtrVC3VhaCGgAzzbvtFCyEYshu1Ko+QVvOv3lmZQWCt0IQO6ABG5gEBqvwAGI5kofQOq1qiOaCOb0a0T2CDzYh2Qb90KoWQTEMfGptIDTrbxxq9HUM2TuKt0wbuf3tmEvcqQ/T7net1QeC+kpRQW0Gj/Eaug1dnTzc11WXbPmVxf1AnrAS2gCV2jT7Au0CRL1a2HguPjIQhinT7hfVqJMeqA1qgZ5CndBXrd0UaC6/UdqaSyA6b6ZNn9RHBBB/XH52IH63rx8dPgHMKmQP0u0KFaoLAhXRGrBoO6Sgz5ySkeuezqmT5+vlBTuNMXtGFaI4wNAKHwEQucVlDk1povl8E2drbRinyvOgERCHkCzVirttHIIbG2K3qlo5xqj0FAQDzOGQYYJSnISC7PcvQQ+gF1CfTRcDXJeg2BTaRN1yMJi2AoosMNbsUUe/DhaApmpl1dgK7Ujb+bKkM0CTKOcIukjxQPugR9B7fOa7skBHeRHSRg6A3Po7r7ZWsxYFR3XXiOcUX1yt0KD6NizDTFCdCqGERHVqv+y1DK8Oez9Wbz+ycd7fTQ7N6V6YpG4Z07AoAPyQof0e6B5lUr78xvsdsZSXW4tgyD02uGia5DOR3or0Ft469PvNZb+5/arLsdpJ6Dkf8DO4+Tu9Gs+Uv94EREAEREAEREAEREAERED+NfstwAAy2fUNiniqRQAAAABJRU5ErkJggg=="
                                                                                              alt="" class="eye"></li>
                                                                                               <label>Withdrawal Password</label>
                        <li data-v-79134734=""><input data-v-79134734="" placeholder="Please enter withdrawal password"
                                                      name="withdraw_password" type="password"><img data-v-79134734=""
                                                                                              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkZGODBCNzE0NkFGNTExRTlCOTMzRTFGMEZEMjg1N0U2IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkZGODBCNzE1NkFGNTExRTlCOTMzRTFGMEZEMjg1N0U2Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RkY4MEI3MTI2QUY1MTFFOUI5MzNFMUYwRkQyODU3RTYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RkY4MEI3MTM2QUY1MTFFOUI5MzNFMUYwRkQyODU3RTYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5Zo3XTAAADHElEQVR42uyZXUhUQRTH7123QEqspChIn6y2CEKifKhAoodedmsfIiqKsmgpoi8Swoegb3opqaDWggqDYiULlkCwVl8kwofIwkKWMouKIslUrNW6/Q+chWG6e7mr3ZXsHPgzc2dmZ+Y3d+bM2V3TsixjPJjPGCcmIAIiIAIiIAIiIAIiIALy/4D47Qqj0doyJBegYugsdPHuy/jPsZjg5tIKX7+/YDeyVdBHaG8ksvOxKxDYFWgx52ugXuj6WIAAYj3PIQ8qga5BC9xurZna8+FwIFiSa4hwIDQDSTVDZJqbI8gJ7XkedBMwE3MFsWZ+GLvFuoXsQq3quGsQnIfLSJq14hVQPWDycuKFrOEbSFZqxa3Fg1012XqtrVC3VhaCGgAzzbvtFCyEYshu1Ko+QVvOv3lmZQWCt0IQO6ABG5gEBqvwAGI5kofQOq1qiOaCOb0a0T2CDzYh2Qb90KoWQTEMfGptIDTrbxxq9HUM2TuKt0wbuf3tmEvcqQ/T7net1QeC+kpRQW0Gj/Eaug1dnTzc11WXbPmVxf1AnrAS2gCV2jT7Au0CRL1a2HguPjIQhinT7hfVqJMeqA1qgZ5CndBXrd0UaC6/UdqaSyA6b6ZNn9RHBBB/XH52IH63rx8dPgHMKmQP0u0KFaoLAhXRGrBoO6Sgz5ySkeuezqmT5+vlBTuNMXtGFaI4wNAKHwEQucVlDk1povl8E2drbRinyvOgERCHkCzVirttHIIbG2K3qlo5xqj0FAQDzOGQYYJSnISC7PcvQQ+gF1CfTRcDXJeg2BTaRN1yMJi2AoosMNbsUUe/DhaApmpl1dgK7Ujb+bKkM0CTKOcIukjxQPugR9B7fOa7skBHeRHSRg6A3Po7r7ZWsxYFR3XXiOcUX1yt0KD6NizDTFCdCqGERHVqv+y1DK8Oez9Wbz+ycd7fTQ7N6V6YpG4Z07AoAPyQof0e6B5lUr78xvsdsZSXW4tgyD02uGia5DOR3or0Ft469PvNZb+5/arLsdpJ6Dkf8DO4+Tu9Gs+Uv94EREAEREAEREAEREAERED+NfstwAAy2fUNiniqRQAAAABJRU5ErkJggg=="
                                                                                              alt="" class="eye"></li>

                        <label>Invite Code</label>
                        <li data-v-79134734=""><input data-v-79134734="" type="text" name="ref_by" value="{{isset($ref_by) && !empty($ref_by) && $ref_by != null ? $ref_by : ''}}"
                                                      readonly="" placeholder="Invitation code"></li>
                    </ul>
                    <div data-v-79134734="" style="
    margin: 0 auto;
    display: flex;
    width: 100%;
">
                        <button data-v-79134734="" type="button" class="form-buttom" style="    margin: 0 auto;">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="wxtip" id="JweixinTip">
    <div class="imgs"></div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@include('alert-message')
<script type="application/javascript">
    $(function () {
        $(".form-buttom").on('click', function () {
            document.querySelector('#forgetpwd-form').submit();
        })
    })
</script>
</body>
</html>
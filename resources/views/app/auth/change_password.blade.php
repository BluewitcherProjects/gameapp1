<html style="--status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --window-top: calc(var(--top-window-height) + calc(44px + env(safe-area-inset-top))); --window-bottom: 0px;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Password</title>
    <meta property="og:title" content="Agridevelop Plus">
    <meta property="og:image" content="{{asset('static/login/logo.png')}}">
    <meta name="description"
          content="In the previous Agridevelop project, many people made their first pot of gold through the Agridevelop App. The new AgriDevelop Plus App has just opened registration in March 2024. We will build the best and most long-lasting online money-making application in India. Join AgriDevelop as soon as possible and you will have the best opportunity to make money.	">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="{{asset('static/index.2da1efab.css')}}">
    <link rel="stylesheet" href="{{asset('password.css')}}">
    <style>
        .my_btn[data-v-70827b61] {
            text-align: center;
            font-weight: 500;
            font-size: 17px;
            padding: .8em 0;
            color: #fff;
            background: #F79700;
            border: none;
            box-shadow: 0 .7em 1.5em -.5em #F79700;
            letter-spacing: .05em;
            border-radius: 0;
        }
    </style>
</head>
<body class="uni-body pages-my-password">
<form action="{{route('user.change.password.confirmation')}}" method="post">
    @csrf
    <uni-app class="uni-app--maxwidth">
        <uni-page data-page="pages/my/password">
            <uni-page-head uni-page-head-type="default">
                <div class="uni-page-head" style="background-color: #F79700; color: rgb(255, 255, 255);">
                    <div class="uni-page-head-hd">
                        <div class="uni-page-head-btn" onclick="window.location.href='{{route('profile')}}'"><i class="uni-btn-icon"
                                                                                                                style="color: rgb(255, 255, 255); font-size: 27px;"></i></div>
                        <div class="uni-page-head-ft"></div>
                    </div>
                    <div class="uni-page-head-bd">
                        <div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> Change Login Password</div>
                    </div>
                    <div class="uni-page-head-ft"></div>
                </div>
                <div class="uni-placeholder"></div>
            </uni-page-head>
            <uni-page-wrapper>
                <uni-page-body>
                    <uni-view data-v-70827b61="" class="content">
                        <uni-view data-v-70827b61="" class="itembox">
                            <uni-view data-v-70827b61="" class="input_con">
{{--                                <uni-view data-v-70827b61="" class="input_lable">Current Password</uni-view>--}}
                                <uni-input data-v-70827b61="" class="input_box">
                                    <div class="uni-input-wrapper">
                                        <input maxlength="20" step="" placeholder="Enter Current Password" name="old_password" autocomplete="off" type="password"
                                               class="uni-input-input"></div>
                                </uni-input>
                            </uni-view>
                            <uni-view data-v-70827b61="" class="input_con">
{{--                                <uni-view data-v-70827b61="" class="input_lable">New Password</uni-view>--}}
                                <uni-input data-v-70827b61="" class="input_box">
                                    <div class="uni-input-wrapper">
                                        <input maxlength="20" step="" name="new_password" placeholder="Enter A New Password" autocomplete="off" type="password"
                                               class="uni-input-input"></div>
                                </uni-input>
                            </uni-view>
                            <uni-view data-v-70827b61="" class="input_con">
{{--                                <uni-view data-v-70827b61="" class="input_lable">Confirm Password 2</uni-view>--}}
                                <uni-input data-v-70827b61="" class="input_box">
                                    <div class="uni-input-wrapper">
                                        <input maxlength="20" step="" name="confirm_password" placeholder="Enter Confirm Password" autocomplete="off" type="password"
                                               class="uni-input-input"></div>
                                </uni-input>
                            </uni-view>
                            <uni-view onclick="submirPass()" data-v-70827b61="" class="my_btn">Confirm now</uni-view>
                        </uni-view>
                    </uni-view>
                </uni-page-body>
            </uni-page-wrapper>
        </uni-page>
    </uni-app>
</form>
@include('alert-message')
<script>
    function submirPass(){
        message('Processing')
        document.querySelector('form').submit();
    }
</script>
</body>
</html>

<html style="--status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --window-top: calc(var(--top-window-height) + calc(44px + env(safe-area-inset-top))); --window-bottom: 0px;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bank Account</title>
    <meta property="og:title" content="Agridevelop Plus">
    <meta property="og:image" content="static/login/logo.png">
    <meta name="description" content="In the previous Agridevelop project, many people made their first pot of gold through the Agridevelop App. The new AgriDevelop Plus App has just opened registration in March 2024. We will build the best and most long-lasting online money-making application in India. Join AgriDevelop as soon as possible and you will have the best opportunity to make money. ">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('static/index.2da1efab.css')}}">
    <link rel="stylesheet" href="{{asset('bank.css')}}">

    <style>
    
uni-page-head .uni-page-head {
    position: fixed;
    left: var(--window-left);
    right: var(--window-right);
    height: 44px;
    height: calc(44px + constant(safe-area-inset-top));
    height: calc(44px + env(safe-area-inset-top));
    padding: 7px 3px;
    padding-top: calc(7px + constant(safe-area-inset-top));
    padding-top: calc(7px + env(safe-area-inset-top));
    display: -webkit-box;
    display: -webkit-flex;
    display: flex
;
    overflow: hidden;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    box-sizing: border-box;
    z-index: 998;
    color: #fff;
    background-color: #F79700;
    -webkit-transition-property: all;
    transition-property: all;
}
        select {
            border: none;
        }
        select:focus-visible {
            border: none;
            outline: none;
        }
        .my_btn[data-v-e547158c] {
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

        .uni-page-head {
            position: relative;
            background-color: #F79700;
            color: #fff;
        }
        .uni-page-head-btn {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #fff;
            font-size: 24px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }
        .uni-page-head-bd {
            text-align: center;
            padding: 0 50px; 
        }
    </style>
</head>

@php $user = auth()->user(); @endphp

<body class="uni-body pages-my-card">
    <form action="{{route('setup.gateway.submit')}}" method="post">
        @csrf
        <uni-app class="uni-app--maxwidth">
            <uni-page data-page="pages/my/card">
                <uni-page-head uni-page-head-type="default">
                    <div class="uni-page-head">
                        <div class="uni-page-head-hd">
                            <div class="uni-page-head-btn" onclick="window.location.href='{{route('profile')}}'">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </div>
                            <div class="uni-page-head-ft"></div>
                        </div>
                        <div class="uni-page-head-bd">
                            <div class="uni-page-head__title" style="font-size: 16px; opacity: 1;">
                                Bank Account
                            </div>
                        </div>
                        <div class="uni-page-head-ft"></div>
                    </div>
                    <div class="uni-placeholder"></div>
                </uni-page-head>

                <uni-page-wrapper>
                    <uni-page-body>
                        <uni-view data-v-e547158c="" class="content">
                            <uni-view data-v-e547158c="" class="itembox">
                                <uni-view data-v-e547158c="" class="input_con">
                                    <uni-input data-v-e547158c="" class="input_box">
                                        <div class="uni-input-wrapper">
                                            <input maxlength="40" type="text" placeholder="Actual Name" name="realname" value="{{ $user->realname }}" class="uni-input-input" required>
                                        </div>
                                    </uni-input>
                                </uni-view>

                                <uni-view data-v-e547158c="" class="input_con">
                                    <uni-input data-v-e547158c="" class="input_box">
                                        <div class="uni-input-wrapper">
                                            <input placeholder="Bank account number" name="gateway_number" type="text" value="{{ $user->gateway_number }}" class="uni-input-input" required>
                                        </div>
                                    </uni-input>
                                </uni-view>

                                <uni-view data-v-e547158c="" class="input_con">
                                    <uni-input data-v-e547158c="" class="input_box">
                                        <div class="uni-input-wrapper">
                                            <input placeholder="Bank name" name="bank_name" type="text" value="{{ $user->bank_name }}" class="uni-input-input" required>
                                        </div>
                                    </uni-input>
                                </uni-view>

                                <uni-view data-v-e547158c="" class="input_con">
                                    <uni-input data-v-e547158c="" class="input_box">
                                        <div class="uni-input-wrapper">
                                            <input placeholder="Bank IFSC" name="ifsc" type="text" value="{{ $user->ifsc }}" class="uni-input-input" required>
                                        </div>
                                    </uni-input>
                                </uni-view>

                                <uni-view data-v-e547158c="" class="my_btn" onclick="submitBank()">
                                    Confirm and continue
                                </uni-view>
                            </uni-view>
                        </uni-view>
                    </uni-page-body>
                </uni-page-wrapper>
            </uni-page>
        </uni-app>
    </form>

    @include('alert-message')
    @include('loading')

    <script>
        function submitBank() {
            message('Processing');
            document.querySelector('form').submit();
        }
    </script>
</body>
</html>

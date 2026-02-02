<html style="--status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --window-top: calc(var(--top-window-height) + calc(44px + env(safe-area-inset-top))); --window-bottom: 0px;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Withdraw record</title>
    <meta property="og:title" content="Agridevelop Plus">
    <meta property="og:image" content="{{asset('static/login/logo.png')}}">
    <meta name="description"
          content="In the previous Agridevelop project, many people made their first pot of gold through the Agridevelop App. The new AgriDevelop Plus App has just opened registration in March 2024. We will build the best and most long-lasting online money-making application in India. Join AgriDevelop as soon as possible and you will have the best opportunity to make money.	">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="{{asset('static/index.2da1efab.css')}}">
    <link rel="stylesheet" href="{{asset('record.css')}}">
    <style>
        .content .msgbox .item[data-v-52b6708e] {
            background-color: unset;
            padding-top: 3px;
            border-radius: 12px;
            box-shadow: 1px 5px 5px #a3a3a3;
        }

        .content .msgbox .item_t[data-v-52b6708e] {
            background-color: #F79700;
            border-radius: 0px;
            margin-bottom: 6px;
        }
        *{
            color: #FFFFFF !important;
        }
    </style>
</head>
<body class="uni-body pages-my-rechargelist">
<uni-app class="uni-app--maxwidth">
    <uni-page data-page="pages/my/rechargelist">
        <uni-page-head uni-page-head-type="default">
            <div class="uni-page-head" style="background-color: #F79700; color: rgb(255, 255, 255);">
                <div class="uni-page-head-hd">
                    <div class="uni-page-head-btn" onclick="window.location.href='{{route('profile')}}'"><i class="uni-btn-icon"
                                                                                                            style="color: rgb(255, 255, 255); font-size: 27px;"></i></div>
                    <div class="uni-page-head-ft"></div>
                </div>
                <div class="uni-page-head-bd">
                    <div class="uni-page-head__title" style="font-size: 16px; opacity: 1;"> Withdrawal information</div>
                </div>
                <div class="uni-page-head-ft"></div>
            </div>
            <div class="uni-placeholder"></div>
        </uni-page-head>
        <uni-page-wrapper>
            <uni-page-body>
                <style>
                    .content .msgbox .item_t .con[data-v-52b6708e] {
                        padding: 0 16px;
                        display: flex;
                    }
                    .content .msgbox .item_t .title[data-v-52b6708e] {
                        padding-bottom: 0;
                    }
                    .content .msgbox .item_t .con .conitem .msg[data-v-52b6708e] {
                        padding-bottom: 0;
                    }
                </style>
                <uni-view data-v-52b6708e="" class="content">
                    <uni-view data-v-7cf13343="" data-v-52b6708e="">

                        @if(\App\Models\Withdrawal::where('user_id', auth()->id())->count() > 0)
                            <uni-view data-v-52b6708e="" class="msgbox">
                                @foreach(\App\Models\Withdrawal::where('user_id', auth()->id())->orderByDesc('id')->get() as $element)
                                    <uni-view data-v-52b6708e="" class="item">
                                        <uni-view data-v-52b6708e="" class="item_t">
                                            <uni-view data-v-52b6708e="" class="title">
                                                <uni-view data-v-52b6708e="" class="title_2">{{$element->oid}}</uni-view>
                                            </uni-view>
                                            <uni-view data-v-52b6708e="" class="types">Withdrawal</uni-view>
                                            <uni-view data-v-52b6708e="" class="con">
                                                <uni-view data-v-52b6708e="" class="conitem">
                                                    <uni-view data-v-52b6708e="" class="lab">Amount</uni-view>
                                                    <uni-view data-v-52b6708e="" class="msg">
                                                        <uni-text data-v-0dd1b27e="" data-v-52b6708e="" class="u-count-num"
                                                                  style="font-size: 12px; font-weight: bold; color: rgb(0, 0, 0);">
                                                            <span>{{price($element->amount)}}</span></uni-text>
                                                    </uni-view>
                                                </uni-view>
                                                <uni-view data-v-52b6708e="" class="conitem">
                                                    <uni-view data-v-52b6708e="" class="lab">Withdrawal Time</uni-view>
                                                    <uni-view data-v-52b6708e="" class="msg">{{\Carbon\Carbon::parse($element->created_at)->format('Y-M-d H:i:a')}}</uni-view>
                                                </uni-view>
                                            </uni-view>
                                            <uni-view data-v-52b6708e="" class="types2">
                                                <uni-view data-v-52b6708e="" class="lab">Current State</uni-view>
                                                <uni-view data-v-52b6708e="" class="msg">
                                                    <uni-text data-v-52b6708e="" class="sh"><span style="text-transform: capitalize">{{$element->status}}</span>
                                                    </uni-text>
                                                </uni-view>
                                            </uni-view>
                                        </uni-view>
                                    </uni-view>
                                @endforeach
                            </uni-view>
                        @else

                            <uni-view data-v-7cf13343="" class="nullmsg">No Data</uni-view>
                        @endif
                    </uni-view>

                </uni-view>
            </uni-page-body>
        </uni-page-wrapper>
    </uni-page>
</uni-app>
</body>
</html>

<html
    style="--vh: 7.38px; --primary: #41CEB2; --primary-second: #00C1CC; --bg: linear-gradient(180deg, #004b50 0%, #011f21 100%); --bg-tab: #344e4f; --bg-input: rgba(0, 52, 55, 0.29); --btn-bg: linear-gradient(144deg, #00C1CC 14.85%, #00828A 83.66%); --btn-bg2: linear-gradient(144deg, #47E7DD 14.85%, #00B68A 83.66%); --radio-color: #fff; --btn-shadow: 2px 6px 10px 0px rgba(65,206,178, 0.4);">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="google" content="notranslate">

    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('d')}}/BaseMainBtn-cf1599ad.css">
    <link rel="stylesheet" href="{{asset('d')}}/ContainerForm-4e418d51.css">
    <link rel="stylesheet" href="{{asset('d')}}/index-9e27b9a5.css">
    <link rel="stylesheet" href="{{asset('d')}}/index-d56192c0.css">
    <link rel="stylesheet" href="{{asset('d')}}/BaseInput-71f88b96.css">
    <link rel="stylesheet" href="{{asset('d')}}/NavBar-8348630c.css">
    <link rel="stylesheet" href="{{asset('d')}}/register-b5beeeeb.css">
    <link rel="stylesheet" href="{{asset('d')}}/tabbar-1c409faa.css">
    <link rel="stylesheet" href="{{asset('d')}}/ContainerCard-73134c2c.css">
    <link rel="stylesheet" href="{{asset('d')}}/InvestCard-138dfc09.css">
    <link rel="stylesheet" href="{{asset('d')}}/index-c9784ae4.css">
    <link rel="stylesheet" href="{{asset('d')}}/BaseList-5462378a.css">
    <link rel="stylesheet" href="{{asset('d')}}/mission-9d1baeb5.css">
    <link rel="stylesheet" href="{{asset('d')}}/team-cf812b6b.css">
    <link rel="stylesheet" href="{{asset('d')}}/mine-8007a541.css">
    <link rel="stylesheet" href="{{asset('d')}}/second-905a3b2a.css">
    <link rel="stylesheet" href="{{asset('d')}}/select-3e1d5cbb.css">
    <link rel="stylesheet" href="{{asset('d')}}/BaseHtml-c928671d.css">
    <link rel="stylesheet" href="{{asset('d')}}/recharge-e382c0d8.css">
    <link rel="stylesheet" href="{{asset('d')}}/index-650bd478.css">
    <style>
        .in {
            width: 100%;
            height: 38px;
            background: transparent;
        }
        .in:focus-visible{
            outline: none;
            border: none;
        }
        .\:uno\:.site-name.ml-8px.sdsdsd {
            font-size: 30px;
        }
    </style>
</head>

<body class="">
<div id="app" data-v-app="" class="a-t-1 no-3">
    <div class="box-border min-h-full w-full pt-45px">
        <div data-v-b797c13e="" class="navigation">
            <div data-v-b797c13e="" class="navigation-content">
                <div data-v-b797c13e="" class="h-full flex cursor-pointer items-center" onclick="window.location.href='{{url('deposit')}}'">
                    <div data-v-b797c13e="" class="icon i-material-symbols-arrow-back-ios-new-rounded"></div>
                </div>
            </div>
        </div>
        <div data-v-eb7799e8="" class="recharge-wrap p-$mg">
            <div data-v-eb7799e8="" class=":uno: container-card relative rd-$card-radius p-$mg c-$btn-text">
                <div data-v-eb7799e8="" class=":uno: base-logo flex items-center small-logo" style="display: flex;justify-content: space-between;align-items: center;">
                    <div style="display: flex;align-items: center;">
                        <div>OnlinePayment</div>
                    </div>

                    <div class=":uno: site-name ml-8px sdsdsd">{{price($amount)}}</div>
                </div>
                <div data-v-eb7799e8="" class="flex items-center my-20px justify-center"><span
                        data-v-eb7799e8="" class="ml-4px font-bold">{{$channel->channel}}</span></div>
                <div data-v-eb7799e8="" class=":uno: mt-25px flex justify-center">
                    <div data-v-eb7799e8=""
                         class=":uno: h-164px w-164px flex items-center justify-center border rd-10px shadow-$box-shadow bg-white">
                        <div data-v-eb7799e8="" class="qrcode" title="TBWkpCxnyVMJ2YBmRubLAyZP5gQmhV53q7">
                            <canvas width="140" height="140" style="display: none;"></canvas>
                            <img alt="Scan me!"
                                 src="data:image/png;base64,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"
                                 style="display: block;"></div>
                    </div>
                </div>
                <div data-v-eb7799e8="" class=":uno: my-$mg text-center text-18px font-bold">Address</div>
                <div data-v-eb7799e8="" class="base-input copy-address"><span data-v-eb7799e8=""
                                                                              class=":uno: text-13px c-$text-gray6">{{$channel->address}}</span>
                    <div data-v-eb7799e8="" class="cp btn" onclick="copyLink('{{$channel->address}}')"><span data-v-eb7799e8="">Copy</span></div>
                </div>
                <form action="{{route('apiPayment')}}" method="post">
                    @csrf
                    <div data-v-eb7799e8="" class="base-input copy-address">
                    <span data-v-eb7799e8="" class=":uno: text-13px c-$text-gray6" style="width: 100%;">
                        <input type="text" class="in" name="address" placeholder="Enter your payment address">
                    </span>
                    </div>

                    <div data-v-eb7799e8="" class="base-input copy-address">
                    <span data-v-eb7799e8="" class=":uno: text-13px c-$text-gray6" style="width: 100%;">
                        <input type="text" name="transaction" class="in" placeholder="Enter your transaction id">
                    </span>
                    </div>

                    <input type="hidden" name="channel" value="{{$channel->channel}}">
                    <input type="hidden" name="amount" value="{{$amount}}">
                </form>

                <a href="javascript:void(0)" onclick="deposit()" data-v-eb7799e8="" class=":uno: base-main-btn flex items-center justify-center">
                    <div class="base-main-btn-content"><span data-v-eb7799e8="">Recharge completed</span></div>
                </a></div>
            <div data-v-9399a5f5="" data-v-eb7799e8=""
                 class=":uno: container-card relative rd-$card-radius p-$mg c-$btn-text mt-4">
                <div data-v-9399a5f5="" class="rich-text text-base"><p><span style="font-size: 10pt;">1. Copy the address above or scan the QR code and select Tron (TRC20) network to recharge TRX</span>
                    </p>
                    <p><span style="font-size: 10pt;">2. Please do not recharge other non-<span
                                style="font-size: 13.3333px;">Tron(TRC20)</span>-TRX assets, recharge The funds will arrive in your account in about 1 to 3 minutes</span>
                    </p>
                    <p><span style="font-size: 10pt;">3. If it does not arrive for a long time, please refresh the page or contact customer service</span>
                    </p></div>
            </div>
        </div>
    </div>
</div>
@include('alert-message')
<script>

    function deposit(){

        message('Loading...')

        document.querySelector('form').submit();
    }

    function copyLink(text)
    {
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
        message('Copied success..')
    }
</script>
</body>
</html>

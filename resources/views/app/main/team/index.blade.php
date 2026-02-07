<x-app-layout>
    <div class="py-6 space-y-6" x-data="{ activeTab: 'lv1' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Stats Card -->
            <x-card class="bg-primary-midnight/50 backdrop-blur-md mb-6 border-accent-gold/20">
                <div class="p-6">
                    <h2 class="text-xl font-bold text-accent-gold mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Team Overview
                    </h2>

                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Stat Item -->
                        <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                            <p class="text-metallic-silver text-sm mb-1">Team Size</p>
                            <p class="text-2xl font-bold text-white">{{$team_size}}</p>
                        </div>

                        <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                            <p class="text-metallic-silver text-sm mb-1">Total Recharge</p>
                            <p class="text-2xl font-bold text-accent-cyan">₹{{ number_format($lvTotalDeposit, 2) }}</p>
                        </div>

                        <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                            <p class="text-metallic-silver text-sm mb-1">Total Withdraw</p>
                            <p class="text-2xl font-bold text-accent-gold">₹{{ number_format($lvTotalWithdraw, 2) }}</p>
                        </div>

                        <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                            <p class="text-metallic-silver text-sm mb-1">Rebate Rates</p>
                            <div class="flex items-end space-x-2">
                                <span class="text-lg font-bold text-white">20%</span>
                                <span class="text-sm text-metallic-silver">|</span>
                                <span class="text-lg font-bold text-white">3%</span>
                                <span class="text-sm text-metallic-silver">|</span>
                                <span class="text-lg font-bold text-white">1%</span>
                            </div>
                        </div>

                        <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                            <p class="text-metallic-silver text-sm mb-1">Total Commission</p>
                            <p class="text-2xl font-bold text-emerald-400">₹{{ number_format($levelTotalCommission1 +
                                $levelTotalCommission2 + $levelTotalCommission3, 2) }}</p>
                        </div>

                        <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                            <p class="text-metallic-silver text-sm mb-1">Active Investors</p>
                            <p class="text-2xl font-bold text-white">
                                {{ $first_level_users->where('investor', 1)->count() +
                                $second_level_users->where('investor', 1)->count() +
                                $third_level_users->where('investor', 1)->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </x-card>

            <!-- Level Tabs -->
            <div class="flex justify-center mb-6">
                <div
                    class="bg-primary-midnight/50 backdrop-blur-md p-1 rounded-xl border border-white/10 inline-flex w-full sm:w-auto">
                    <button @click="activeTab = 'lv1'"
                        :class="{ 'bg-gradient-to-r from-accent-cyan to-primary-teal text-white shadow-lg': activeTab === 'lv1', 'text-metallic-silver hover:text-white': activeTab !== 'lv1' }"
                        class="flex-1 sm:flex-none px-6 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                        Level 1
                    </button>
                    <button @click="activeTab = 'lv2'"
                        :class="{ 'bg-gradient-to-r from-accent-cyan to-primary-teal text-white shadow-lg': activeTab === 'lv2', 'text-metallic-silver hover:text-white': activeTab !== 'lv2' }"
                        class="flex-1 sm:flex-none px-6 py-2 rounded-lg text-sm font-semibold transition-all duration-300 ml-2">
                        Level 2
                    </button>
                    <button @click="activeTab = 'lv3'"
                        :class="{ 'bg-gradient-to-r from-accent-cyan to-primary-teal text-white shadow-lg': activeTab === 'lv3', 'text-metallic-silver hover:text-white': activeTab !== 'lv3' }"
                        class="flex-1 sm:flex-none px-6 py-2 rounded-lg text-sm font-semibold transition-all duration-300 ml-2">
                        Level 3
                    </button>
                </div>
            </div>

            <!-- Content Area -->
            <div class="space-y-6">

                <!-- Level 1 List -->
                <div x-show="activeTab === 'lv1'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100">
                    @if($u1->count() > 0)
                    <div class="space-y-4">
                        @foreach($u1 as $user)
                        <x-card class="bg-primary-midnight/30 hover:bg-primary-midnight/50 transition-colors">
                            <div class="p-4 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="h-10 w-10 rounded-full bg-accent-cyan/10 flex items-center justify-center border border-accent-cyan/20">
                                        <span class="text-accent-cyan font-bold">{{ substr($user->phone, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">{{ $user->phone }}</p>
                                        <p class="text-xs text-metallic-silver">{{ $user->created_at->format('M d, Y')
                                            }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    @php
                                    $totalDeposit = \App\Models\Deposit::where('user_id', $user->id)->where('status',
                                    'approved')->sum('amount');
                                    $totalWithdraw = \App\Models\Withdrawal::where('user_id',
                                    $user->id)->where('status', 'approved')->sum('amount');
                                    @endphp
                                    <p class="text-sm">
                                        <span class="text-metallic-silver">In:</span>
                                        <span class="text-accent-cyan font-medium">₹{{ number_format($totalDeposit)
                                            }}</span>
                                    </p>
                                    <p class="text-sm">
                                        <span class="text-metallic-silver">Out:</span>
                                        <span class="text-accent-gold font-medium">₹{{ number_format($totalWithdraw)
                                            }}</span>
                                    </p>
                                </div>
                            </div>
                        </x-card>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $u1->links() }}
                    </div>
                    @else
                    <div class="text-center py-10">
                        <p class="text-metallic-silver">No members in Level 1</p>
                    </div>
                    @endif
                </div>

                <!-- Level 2 List -->
                <div x-show="activeTab === 'lv2'" style="display: none;"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100">
                    @if($u2->count() > 0)
                    <div class="space-y-4">
                        @foreach($u2 as $user)
                        <x-card class="bg-primary-midnight/30 hover:bg-primary-midnight/50 transition-colors">
                            <div class="p-4 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="h-10 w-10 rounded-full bg-accent-gold/10 flex items-center justify-center border border-accent-gold/20">
                                        <span class="text-accent-gold font-bold">{{ substr($user->phone, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">{{ $user->phone }}</p>
                                        <p class="text-xs text-metallic-silver">{{ $user->created_at->format('M d, Y')
                                            }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    @php
                                    $totalDeposit = \App\Models\Deposit::where('user_id', $user->id)->where('status',
                                    'approved')->sum('amount');
                                    $totalWithdraw = \App\Models\Withdrawal::where('user_id',
                                    $user->id)->where('status', 'approved')->sum('amount');
                                    @endphp
                                    <p class="text-sm">
                                        <span class="text-metallic-silver">In:</span>
                                        <span class="text-accent-cyan font-medium">₹{{ number_format($totalDeposit)
                                            }}</span>
                                    </p>
                                    <p class="text-sm">
                                        <span class="text-metallic-silver">Out:</span>
                                        <span class="text-accent-gold font-medium">₹{{ number_format($totalWithdraw)
                                            }}</span>
                                    </p>
                                </div>
                            </div>
                        </x-card>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $u2->links() }}
                    </div>
                    @else
                    <div class="text-center py-10">
                        <p class="text-metallic-silver">No members in Level 2</p>
                    </div>
                    @endif
                </div>

                <!-- Level 3 List -->
                <div x-show="activeTab === 'lv3'" style="display: none;"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100">
                    @if($u3->count() > 0)
                    <div class="space-y-4">
                        @foreach($u3 as $user)
                        <x-card class="bg-primary-midnight/30 hover:bg-primary-midnight/50 transition-colors">
                            <div class="p-4 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="h-10 w-10 rounded-full bg-primary-teal/20 flex items-center justify-center border border-primary-teal/30">
                                        <span class="text-primary-teal font-bold">{{ substr($user->phone, 0, 1)
                                            }}</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">{{ $user->phone }}</p>
                                        <p class="text-xs text-metallic-silver">{{ $user->created_at->format('M d, Y')
                                            }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    @php
                                    $totalDeposit = \App\Models\Deposit::where('user_id', $user->id)->where('status',
                                    'approved')->sum('amount');
                                    $totalWithdraw = \App\Models\Withdrawal::where('user_id',
                                    $user->id)->where('status', 'approved')->sum('amount');
                                    @endphp
                                    <p class="text-sm">
                                        <span class="text-metallic-silver">In:</span>
                                        <span class="text-accent-cyan font-medium">₹{{ number_format($totalDeposit)
                                            }}</span>
                                    </p>
                                    <p class="text-sm">
                                        <span class="text-metallic-silver">Out:</span>
                                        <span class="text-accent-gold font-medium">₹{{ number_format($totalWithdraw)
                                            }}</span>
                                    </p>
                                </div>
                            </div>
                        </x-card>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $u3->links() }}
                    </div>
                    @else
                    <div class="text-center py-10">
                        <p class="text-metallic-silver">No members in Level 3</p>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<link href="{{asset('static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css')}}" rel="stylesheet">
<script charset="utf-8" src="{{asset('static_new/js/common.js')}}"></script>
<link rel="stylesheet" href="{{asset('static_new/css/theme.css')}}">
<link href="{{asset('static_new6/css/new.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('static_new/css/public.css')}}">
<style type="text/css" title="fading circle style">
    .circle-color-8>div::before {
        background-color: #ccc;
    }

    .list {
        height: 77vh;
        overflow-y: scroll;
    }

    .list>li {
        font-size: .5rem;
        border-bottom: .1rem solid rgb(248, 242, 242);
        padding: .5rem 1rem;
    }

    .order_info {
        /*margin-top: .5rem;*/
        display: flex;
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

    .header>p {
        width: 96%;
        margin: 0 2%;
        height: 46px;
        line-height: 46px;
        text-align: center;
    }

    .info_img {
        width: auto;
        height: 3rem;
        background: #eeeeee;
    }

    .info_data {
        /*max-width: 55%;*/
        /*margin: 0 0 0 0.5rem;*/
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        border-radius: 12px;
        padding: 10px;
        background-color: rgba(239, 246, 255, 1);
    }

    .info_data p {
        width: 100%;
    }

    nav p {
        color: #907878
    }

    .wait_list2 * {
        color: #907878
    }

    .info_store,
    .money {
        color: #00bcd4;
    }

    .info_money {
        margin-left: 20px;
        text-align: left;
        display: flex;
        flex-direction: column;
    }

    .no-data {
        border: none !important;
        text-align: center;
    }

    .info_name,
    .order_num {
        color: #000;
        font-size: 13px
    }

    .info_name,
    .info_store,
    .money,
    .info_num {
        font-size: 14px
    }

    /*.info_data{display: inline-block}*/
    .info_data>p,
    .info_money>p {
        margin-bottom: 3px;
        flex: 1;
        line-height: 30px;
    }

    .info_img img {
        max-height: 60px
    }

    .info_img {
        background: none;
        height: auto
    }

    .mint-tab-container-item li {
        border-bottom: .1rem solid rgb(248, 242, 242);
        padding: 0;
        background: #fff;
        border-radius: 10px;
        padding: 10px;
        margin-top: 3px;
    }

    /* 通用分页 */
    .pagination-container {
        line-height: 40px;
        text-align: right;
    }

    .pagination-container>span {
        color: #666;
        font-size: 9pt;
    }

    .pagination-container>ul {
        float: right;
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    .pagination-container>ul>li {
        z-index: 1;
        display: inline-block;
    }

    .pagination-container>ul>li>a,
    .pagination-container>ul>li>span {
        color: #333;
        width: 33px;
        height: 30px;
        border: 1px solid #dcdcdc;
        display: inline-block;
        margin-left: -1px;
        text-align: center;
        line-height: 28px;
    }

    .pagination-container>ul>li>span {
        background: #dcdcdc;
        cursor: default;
    }

    .van-tab--active span {
        color: #ff9a2c;
    }

    .circle-color-23>div::before {
        background-color: #ccc;
    }

    .notdata {
        display: block;
        text-align: center;
        padding: 30px;
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

    .pagination {
        display: flex;
        font-size: 20px;
        flex-wrap: wrap;
    }

    .pagination li {
        padding-left: 10px
    }

    .mint-tab-container-item {
        /*background: #F79700;*/
    }

    .hot ul[data-v-b7e8b406] {
        border-left: 0 solid #eee;
        border-top: 0 solid #eee;
        padding: 20px 10px;
        background: #fff;
        border-radius: 14px;
        margin-top: 16px;
    }

    .report p[data-v-b7e8b406] {
        color: #F79700;
        font-weight: 500;
        font-size: 13px;
    }

    body {
        font-size: 1rem;
        color: #3c4040;
    }

    .nav .btn.on[data-v-b7e8b406] {
        color: #fff;
        background: linear-gradient(to bottom, #ffcc33, #ff8100);
        display: block;
        align-items: center;
    }

    .report[data-v-b7e8b406] {
        border-top: 0px solid #000;
        font-size: 0.48rem;
        display: inline-block;
        /* background: #F79700; */
        display: flex;
        align-items: center;
        display: flex;
        /* border-bottom: 3px solid #000; */
        flex-wrap: wrap;
        justify-content: center;
    }

    .lli {
        height: 30px;
        width: 2px;
        background: #ddd9d9;
    }

    .report div[data-v-b7e8b406] {
        color: #F79700;
        /* font-weight: 600; */
        font-size: 16px;
        width: 32.3%;
        height: 1.4rem;
        /* float: left; */
        text-align: left;
        /* background: #CCFFFF; */
        padding: 0;
        /* border-right: 0.013333rem solid #F79700; */
        /* border-bottom: 0.013333rem solid #eee; */
        /* margin: 1%; */
        text-align: center;
    }

    .nav .btn[data-v-b7e8b406] {
        width: 31.3%;
        margin: 1%;
        text-align: center;
        color: #F79700;
        font-size: 0.373333rem;

        line-height: .566667rem;
        display: block;
        /*height: 1.8rem;*/
        background: transparent;
        float: left;
        /*border-bottom: 0.053333rem solid #ccc;*/
        background-color: rgba(239, 246, 255, 1);
        border-radius: 14px;
        /*display: flex;*/
        justify-content: center;
        align-items: center;
        padding: 0 0;
    }
</style>

</head>

<body style="font-size: 12px;">

    <div id="app">
        <div data-v-b7e8b406="" class="main">
            <div class="header" style="background: #F79700;">
                <div class="goback" style="color: #fff!important"><span class="icon iconfont icon-fanhui" style="
                font-size: 14px;
            " onclick="window.history.back(-1)"></span><a href="javascript:history.go(-1)"
                        style="color: #fff!important"></a></div>
                <p style="color: #fff!important">My team</p>
            </div>
            <div
                style="margin: 30px 10px 10px;    background: #f1f1f1cf;position: relative;padding: 10px;border-radius: 14px;">
                <div data-v-b7e8b406="" class="report" style="width: 100%;">
                    <div data-v-b7e8b406="" class="lf">
                        <p data-v-b7e8b406="">Team size</p><span style="color:#FF0033">{{$team_size}}</span>
                    </div>
                    <div class="lli"></div>
                    <div data-v-b7e8b406="" class="lf">
                        <p data-v-b7e8b406="">Team recharge</p><span
                            style="color:#FF9900">{{price($lvTotalDeposit)}}</span>
                    </div>
                    <div class="lli"></div>
                    <div data-v-b7e8b406="" class="lf">
                        <p data-v-b7e8b406="">Team withdraw</p><span
                            style="color:#FF33CC">{{price($lvTotalWithdraw)}}</span>
                    </div>
                    <div data-v-b7e8b406="" class="lf">
                        <p data-v-b7e8b406="">Rebate Percentage</p><span style="color:#FF0033">20%|3%|1%</span>
                    </div>
                    <div class="lli"></div>
                    <div data-v-b7e8b406="" class="lf">
                        <p data-v-b7e8b406="">Commission</p><span style="color:#FF9900">{{price($levelTotalCommission1 +
                            $levelTotalCommission2 + $levelTotalCommission3)}}</span>
                    </div>
                    <div class="lli"></div>
                    <div data-v-b7e8b406="" class="lf">
                        <p data-v-b7e8b406="">Activation</p><span
                            style="color:#FF33CC">{{$first_level_users->where('investor', 1)->count() +
                            $second_level_users->where('investor', 1)->count() + $third_level_users->where('investor',
                            1)->count()}}</span>
                    </div>
                </div>
            </div>
            <div data-v-b7e8b406="" class="nav">
                <button data-v-b7e8b406="" onclick="lvChange(this, '1')"
                    class="mint-button mint-button--default mint-button--normal btn on">
                    <div>
                        <label class="mint-button-text" style="padding-left: 5px;">LV1<br></label>
                    </div>
                </button>
                <button data-v-b7e8b406="" onclick="lvChange(this, '2')"
                    class="mint-button mint-button--default mint-button--normal btn ">
                    <div>
                        <label class="mint-button-text" style="padding-left: 5px;">LV2<br></label>
                    </div>
                </button>
                <button data-v-b7e8b406="" onclick="lvChange(this, '3')"
                    class="mint-button mint-button--default mint-button--normal btn ">
                    <div><label class="mint-button-text" style="padding-left: 5px;">LV3<br></label></div>
                </button>
            </div>

            <div data-v-b7e8b406="" class="mint-loadmore">
                <div class="mint-loadmore-content">
                    <div data-v-b7e8b406="" class="page-tab-container hot">
                        <div data-v-b7e8b406="" class="mint-tab-container page-tabbar-tab-container">
                            <div class="mint-tab-container-wrap">
                                <div data-v-b7e8b406="" class="mint-tab-container-item pc1">
                                    <ul data-v-b7e8b406="" class="userlists" style="padding: 10px 10px;">
                                        @foreach($u1 as $element)
                                        <?php
                                        $w = price(\App\Models\Withdrawal::select('user_id', 'amount')->where('user_id', $element->id)->where('status', 'approved')->sum('amount'));
                                        $d = price(\App\Models\Deposit::select('user_id', 'amount')->where('user_id', $element->id)->where('status', 'approved')->sum('amount'));
                                        ?>
                                        <li>
                                            <div class="order_info">
                                                <div class="info_img"><img src="{{asset('pic/head1.jpg')}}" alt=""
                                                        style="background: #F79700;"></div>
                                                <div class="info_money">
                                                    <p class="money" style="color:#F79700;">
                                                        Phone: {{$element->phone}}<span </p>
                                                            <p><span class="info_num"
                                                                    style="color:#F79700;">Registration time:
                                                                    {{$element->created_at}}</span>
                                                            </p>
                                                </div>
                                            </div>
                                            <div class="info_data">
                                                <div style="display: flex;">
                                                    <p class="info_store" style="color:#F79700;">
                                                        <span>Recharge</span>:<span style="color:#0000CC;">{{$d}}</span>
                                                    </p>
                                                    <p class="info_store" style="text-align: end;color:#F79700;"><span
                                                            style="">withdraw</span>:<span
                                                            style="color:#00CC00;">{{$w}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div data-v-b7e8b406="" class="no_more" style="">no data</div>
                                </div>
                                <div data-v-b7e8b406="" class="mint-tab-container-item pc2" style="display: none;">
                                    <ul data-v-b7e8b406="" class="userlists" style="padding: 10px 10px;">
                                        @foreach($u2 as $element)
                                        <?php
                                        $w = price(\App\Models\Withdrawal::select('user_id', 'amount')->where('user_id', $element->id)->where('status', 'approved')->sum('amount'));
                                        $d = price(\App\Models\Deposit::select('user_id', 'amount')->where('user_id', $element->id)->where('status', 'approved')->sum('amount'));
                                        ?>
                                        <li>
                                            <div class="order_info">
                                                <div class="info_img"><img src="{{asset('pic/head1.jpg')}}" alt=""
                                                        style="background: #F79700;"></div>
                                                <div class="info_money">
                                                    <p class="money" style="color:#F79700;">
                                                        Phone: {{$element->phone}}<span </p>
                                                            <p><span class="info_num"
                                                                    style="color:#F79700;">Registration time:
                                                                    {{$element->created_at}}</span>
                                                            </p>
                                                </div>
                                            </div>
                                            <div class="info_data">
                                                <div style="display: flex;">
                                                    <p class="info_store" style="color:#F79700;">
                                                        <span>Recharge</span>:<span style="color:#0000CC;">{{$d}}</span>
                                                    </p>
                                                    <p class="info_store" style="text-align: end;color:#F79700;"><span
                                                            style="">withdraw</span>:<span
                                                            style="color:#00CC00;">{{$w}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div data-v-b7e8b406="" class="no_more" style="">no data</div>
                                </div>
                                <div data-v-b7e8b406="" class="mint-tab-container-item pc3" style="display: none;">
                                    <ul data-v-b7e8b406="" class="userlists" style="padding: 10px 10px;">
                                        @foreach($u3 as $element)
                                        <?php
                                        $w = price(\App\Models\Withdrawal::select('user_id', 'amount')->where('user_id', $element->id)->where('status', 'approved')->sum('amount'));
                                        $d = price(\App\Models\Deposit::select('user_id', 'amount')->where('user_id', $element->id)->where('status', 'approved')->sum('amount'));
                                        ?>
                                        <li>
                                            <div class="order_info">
                                                <div class="info_img"><img src="{{asset('pic/head1.jpg')}}" alt=""
                                                        style="background: #F79700;"></div>
                                                <div class="info_money">
                                                    <p class="money" style="color:#F79700;">
                                                        Phone: {{$element->phone}}<span </p>
                                                            <p><span class="info_num"
                                                                    style="color:#F79700;">Registration time:
                                                                    {{$element->created_at}}</span>
                                                            </p>
                                                </div>
                                            </div>
                                            <div class="info_data">
                                                <div style="display: flex;">
                                                    <p class="info_store" style="color:#F79700;">
                                                        <span>Recharge</span>:<span style="color:#0000CC;">{{$d}}</span>
                                                    </p>
                                                    <p class="info_store" style="text-align: end;color:#F79700;"><span
                                                            style="">withdraw</span>:<span
                                                            style="color:#00CC00;">{{$w}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div data-v-b7e8b406="" class="no_more" style="">no data</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('app.layout.manu')
        </div>
    </div>
    <script>
        function lvChange(_this, numberOfTab) {
            var elements = document.querySelectorAll('.mint-button--normal');
            for (let i = 0; i < elements.length; i++) {
                if (elements[i].classList.contains('on')) {
                    elements[i].classList.remove('on')
                }
            }
            _this.classList.add('on');

            var pc1 = document.querySelector('.pc1');
            var pc2 = document.querySelector('.pc2');
            var pc3 = document.querySelector('.pc3');
            if (numberOfTab == 1) {
                pc1.style.display = 'block'
                pc2.style.display = 'none'
                pc3.style.display = 'none'
            }
            if (numberOfTab == 2) {
                pc1.style.display = 'none'
                pc2.style.display = 'block'
                pc3.style.display = 'none'
            }
            if (numberOfTab == 3) {
                pc1.style.display = 'none'
                pc2.style.display = 'none'
                pc3.style.display = 'block'
            }
        }
    </script>
    <script>
        $('.pagination li').click(function () {
            var class2 = $(this).attr('class');
            if (class2 == 'active' || class2 == 'disabled') {

            } else {
                var url = $(this).find('a').attr('href');
                window.location.href = url;
            }
        })
        $(function () {
            $('.pagination-container select').attr('disabled', 'disabled');
            $('.pagination-container select').attr('readonly', 'readonly');

            // 主题
            new rolldate.Date({
                el: '#start',
                format: 'YYYY-MM-DD',
                beginYear: 2000,
                endYear: 2100,
                theme: 'blue'
            })


            // 主题
            new rolldate.Date({
                el: '#end',
                format: 'YYYY-MM-DD',
                beginYear: 2000,
                endYear: 2100,
                theme: 'blue'
            })
        })
    </script>
</body>

</html>
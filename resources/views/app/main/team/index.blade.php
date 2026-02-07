<x-app-layout>
    <div class="py-6 space-y-6" x-data="{ activeTab: 'lv1' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Premium Stats Header -->
            <div
                class="relative overflow-hidden rounded-2xl bg-hero-gradient p-6 mb-8 shadow-xl shadow-black/20 border border-white/10">
                <div class="absolute inset-0 bg-primary-midnight/60 backdrop-blur-xs"></div>
                <!-- Decorative Elements -->
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-accent-gold/10 blur-3xl rounded-full translate-x-10 -translate-y-10">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-48 h-48 bg-accent-cyan/10 blur-3xl rounded-full -translate-x-5 translate-y-5">
                </div>

                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-white tracking-wide font-heading">Team Overview</h2>
                            <p class="text-metallic-silver text-sm mt-1">Manage and track your referrals</p>
                        </div>
                        <div class="p-3 bg-white/5 rounded-full border border-white/10 shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent-gold" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        <!-- Stat Item: Team Size -->
                        <div
                            class="bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <p class="text-metallic-silver text-xs font-medium uppercase tracking-wider mb-1">Team Size
                            </p>
                            <p class="text-2xl font-bold text-white">{{$team_size}}</p>
                        </div>

                        <!-- Stat Item: Recharge -->
                        <div
                            class="bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <p class="text-metallic-silver text-xs font-medium uppercase tracking-wider mb-1">Total
                                Recharge</p>
                            <p class="text-2xl font-bold text-accent-cyan">₹{{ number_format($lvTotalDeposit, 2) }}</p>
                        </div>

                        <!-- Stat Item: Withdraw -->
                        <div
                            class="bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <p class="text-metallic-silver text-xs font-medium uppercase tracking-wider mb-1">Total
                                Withdraw</p>
                            <p class="text-2xl font-bold text-accent-gold">₹{{ number_format($lvTotalWithdraw, 2) }}</p>
                        </div>

                        <!-- Stat Item: Rebate -->
                        <div
                            class="bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <p class="text-metallic-silver text-xs font-medium uppercase tracking-wider mb-1">Rebate
                                Rates</p>
                            <div class="flex items-end space-x-2">
                                <span class="text-lg font-bold text-white">20%</span>
                                <span class="text-xs text-metallic-silver mb-1">LV1</span>
                                <span class="text-white/50">|</span>
                                <span class="text-lg font-bold text-white">3%</span>
                                <span class="text-xs text-metallic-silver mb-1">LV2</span>
                                <span class="text-white/50">|</span>
                                <span class="text-lg font-bold text-white">1%</span>
                                <span class="text-xs text-metallic-silver mb-1">LV3</span>
                            </div>
                        </div>

                        <!-- Stat Item: Commission -->
                        <div
                            class="bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <p class="text-metallic-silver text-xs font-medium uppercase tracking-wider mb-1">Total
                                Commission</p>
                            <p class="text-2xl font-bold text-emerald-400">₹{{ number_format($levelTotalCommission1 +
                                $levelTotalCommission2 + $levelTotalCommission3, 2) }}</p>
                        </div>

                        <!-- Stat Item: Investors -->
                        <div
                            class="bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <p class="text-metallic-silver text-xs font-medium uppercase tracking-wider mb-1">Active
                                Investors</p>
                            <p class="text-2xl font-bold text-white">
                                {{ $first_level_users->where('investor', 1)->count() +
                                $second_level_users->where('investor', 1)->count() +
                                $third_level_users->where('investor', 1)->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Level Tabs -->
            <div class="flex justify-center mb-8">
                <div
                    class="bg-primary-midnight/50 backdrop-blur-md p-1.5 rounded-2xl border border-white/10 inline-flex w-full sm:w-auto shadow-lg">
                    <button @click="activeTab = 'lv1'"
                        :class="{ 'bg-linear-to-r from-accent-cyan to-blue-600 text-white shadow-md': activeTab === 'lv1', 'text-metallic-silver hover:text-white hover:bg-white/5': activeTab !== 'lv1' }"
                        class="flex-1 sm:flex-none px-8 py-2.5 rounded-xl text-sm font-bold transition-all duration-300">
                        Level 1
                    </button>
                    <button @click="activeTab = 'lv2'"
                        :class="{ 'bg-linear-to-r from-accent-cyan to-blue-600 text-white shadow-md': activeTab === 'lv2', 'text-metallic-silver hover:text-white hover:bg-white/5': activeTab !== 'lv2' }"
                        class="flex-1 sm:flex-none px-8 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 ml-1">
                        Level 2
                    </button>
                    <button @click="activeTab = 'lv3'"
                        :class="{ 'bg-linear-to-r from-accent-cyan to-blue-600 text-white shadow-md': activeTab === 'lv3', 'text-metallic-silver hover:text-white hover:bg-white/5': activeTab !== 'lv3' }"
                        class="flex-1 sm:flex-none px-8 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 ml-1">
                        Level 3
                    </button>
                </div>
            </div>

            <!-- Content Area -->
            <div class="space-y-6">
                <!-- Helper for user list -->
                @php
                $renderUserList = function($users) {
                if($users->count() > 0) {
                echo '<div class="space-y-4">';
                    foreach($users as $user) {
                    $totalDeposit = \App\Models\Deposit::where('user_id', $user->id)->where('status',
                    'approved')->sum('amount');
                    $totalWithdraw = \App\Models\Withdrawal::where('user_id', $user->id)->where('status',
                    'approved')->sum('amount');

                    echo '<div
                        class="bg-primary-midnight/40 backdrop-blur-sm rounded-xl border border-white/5 p-4 flex items-center justify-between hover:border-accent-gold/30 transition-all duration-300 group">
                        ';
                        echo '<div class="flex items-center space-x-4">';
                            echo '<div
                                class="h-12 w-12 rounded-full bg-linear-to-br from-white/10 to-white/5 flex items-center justify-center border border-white/10 group-hover:border-accent-gold/50 transition-colors">
                                ';
                                echo '<span class="text-white font-bold text-lg">' . substr($user->phone, 0, 1) .
                                    '</span>';
                                echo '</div>';
                            echo '<div>';
                                echo '<p class="text-white font-bold tracking-wide">' . $user->phone . '</p>';
                                echo '<p class="text-xs text-metallic-silver mt-0.5">' . $user->created_at->format('M d,
                                    Y') . '</p>';
                                echo '</div>';
                            echo '</div>';
                        echo '<div class="text-right space-y-1">';
                            echo '<p class="text-sm flex items-center justify-end"><span
                                    class="text-metallic-silver/60 mr-2 text-xs uppercase">Recharge</span> <span
                                    class="text-accent-cyan font-bold">₹' . number_format($totalDeposit) . '</span></p>
                            ';
                            echo '<p class="text-sm flex items-center justify-end"><span
                                    class="text-metallic-silver/60 mr-2 text-xs uppercase">Withdraw</span> <span
                                    class="text-accent-gold font-bold">₹' . number_format($totalWithdraw) . '</span></p>
                            ';
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                echo '<div class="text-center py-16 bg-white/5 rounded-xl border border-white/5 border-dashed">';
                    echo '<div class="inline-flex h-16 w-16 rounded-full bg-white/5 items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-metallic-silver/40" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg></div>';
                    echo '<p class="text-metallic-silver font-medium">No members in this level yet</p>';
                    echo '</div>';
                }
                };
                @endphp

                <!-- Level 1 List -->
                <div x-show="activeTab === 'lv1'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    {{ $renderUserList($u1) }}
                    <div class="mt-6">
                        {{ $u1->links() }}
                    </div>
                </div>

                <!-- Level 2 List -->
                <div x-show="activeTab === 'lv2'" style="display: none;"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    {{ $renderUserList($u2) }}
                    <div class="mt-6">
                        {{ $u2->links() }}
                    </div>
                </div>

                <!-- Level 3 List -->
                <div x-show="activeTab === 'lv3'" style="display: none;"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    {{ $renderUserList($u3) }}
                    <div class="mt-6">
                        {{ $u3->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
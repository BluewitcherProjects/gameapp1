<x-app-layout>
    <x-slot name="header">
        {{ __('Income History') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-card class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden">
                <div class="p-6">
                    @php
                    $ledgers = \App\Models\UserLedger::where('user_id', auth()->id())->where('amount', '>',
                    0)->orderByDesc('id')->get();
                    @endphp

                    @if($ledgers->count() > 0)
                    <div class="space-y-4">
                        @foreach($ledgers as $ledger)
                        <div
                            class="bg-white/5 rounded-lg p-4 border border-white/5 hover:bg-white/10 transition-colors flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div class="mb-2 md:mb-0">
                                <h4 class="text-white font-bold text-lg mb-1">{{ strtoupper(str_replace('_', ' ',
                                    $ledger->reason)) }}</h4>
                                <p class="text-metallic-silver text-xs">{{
                                    \Carbon\Carbon::parse($ledger->created_at)->format('d M Y, h:i A') }}</p>
                            </div>
                            <div
                                class="text-right w-full md:w-auto flex flex-row md:flex-col justify-between items-center md:items-end">
                                <span class="text-accent-gold font-bold text-xl block">{{ price($ledger->amount)
                                    }}</span>
                                <span
                                    class="inline-block px-2 py-1 rounded bg-green-500/20 TEXT-green-400 text-xs mt-1 border border-green-500/30">Credit</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-metallic-silver" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white mb-2">No Records Found</h3>
                        <p class="text-metallic-silver">You haven't received any income yet.</p>
                    </div>
                    @endif
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
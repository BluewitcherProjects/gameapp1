<x-app-layout>
    <x-slot name="header">
        {{ __('Recharge History') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-card class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden">
                <div class="p-6">
                    @php
                    $deposits = \App\Models\Deposit::where('user_id', auth()->id())->orderByDesc('id')->get();
                    @endphp

                    @if($deposits->count() > 0)
                    <div class="space-y-4">
                        @foreach($deposits as $deposit)
                        <div
                            class="bg-white/5 rounded-lg p-4 border border-white/5 hover:bg-white/10 transition-colors flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div class="mb-2 md:mb-0">
                                <h4 class="text-white font-bold text-lg mb-1">Order #{{ $deposit->order_id }}</h4>
                                <p class="text-metallic-silver text-xs">
                                    {{ $deposit->created_at->format('d M Y, h:i A') }}
                                </p>
                            </div>
                            <div
                                class="text-right w-full md:w-auto flex flex-row md:flex-col justify-between items-center md:items-end">
                                <span class="text-accent-cyan font-bold text-xl block">{{ price($deposit->amount)
                                    }}</span>
                                <span
                                    class="inline-block px-2 py-1 rounded text-xs mt-1 border uppercase font-bold
                                            {{ $deposit->status == 'approved' ? 'bg-green-500/20 text-green-400 border-green-500/30' :
                                               ($deposit->status == 'pending' ? 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30' : 'bg-red-500/20 text-red-400 border-red-500/30') }}">
                                    {{ $deposit->status }}
                                </span>
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
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white mb-2">No Recharges Found</h3>
                        <a href="{{ route('user.deposit') }}" class="text-accent-cyan hover:underline">Recharge Now</a>
                    </div>
                    @endif
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
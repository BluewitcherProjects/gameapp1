<x-app-layout>
    <x-slot name="header">
        {{ __('News & Updates') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col space-y-6">
                @forelse($notices as $notice)
                <x-card class="active:scale-[0.99] transition-transform">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-white">{{ $notice->title ?? 'System Notice' }}</h3>
                            <span class="text-xs text-metallic-silver bg-white/5 py-1 px-3 rounded-full">
                                {{ $notice->created_at->format('d M Y, h:i A') }}
                            </span>
                        </div>
                        <div class="prose prose-invert max-w-none text-metallic-silver">
                            {!! nl2br(e($notice->content ?? $notice->notice)) !!}
                        </div>
                    </div>
                </x-card>
                @empty
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-metallic-silver" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <p class="text-metallic-silver">No new messages at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
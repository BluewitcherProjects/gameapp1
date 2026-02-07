<x-app-layout>
    <x-slot name="header">
        {{ __('Settings') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-card class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden">
                <div class="p-6 space-y-4">
                    <!-- Profile Settings -->
                    <div class="border-b border-white/10 pb-4">
                        <h3 class="text-lg font-bold text-white mb-2">Account</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="{{ route('user.personal-details') }}"
                                class="flex items-center justify-between p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">
                                <span class="text-metallic-silver">Edit Profile</span>
                                <svg class="w-5 h-5 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <a href="{{ route('user.change.password') }}"
                                class="flex items-center justify-between p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">
                                <span class="text-metallic-silver">Change Password</span>
                                <svg class="w-5 h-5 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <a href="{{ route('user.bank') }}"
                                class="flex items-center justify-between p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">
                                <span class="text-metallic-silver">Bank Settings</span>
                                <svg class="w-5 h-5 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- App Info -->
                    <div>
                        <h3 class="text-lg font-bold text-white mb-2">About App</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="{{ route('about') }}"
                                class="flex items-center justify-between p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">
                                <span class="text-metallic-silver">About Us</span>
                                <svg class="w-5 h-5 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <a href="{{ route('user.download.apk') }}"
                                class="flex items-center justify-between p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors">
                                <span class="text-metallic-silver">Download App</span>
                                <svg class="w-5 h-5 text-accent-cyan" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
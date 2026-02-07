<x-app-layout>
    <x-slot name="header">
        {{ __('Change Password') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
            <x-card class="relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-primary-midnight via-primary-dark to-primary-teal opacity-50">
                </div>

                <div class="relative z-10 p-6">
                    <div class="text-center mb-8">
                        <div
                            class="w-16 h-16 bg-accent-gold/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-accent-gold/30">
                            <svg class="w-8 h-8 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Security Settings</h2>
                        <p class="text-metallic-silver text-sm">Update your login password securely.</p>
                    </div>

                    <form method="POST" action="{{ route('user.change.password.confirmation') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="old_password" :value="__('Current Password')" />
                            <x-text-input id="old_password" class="block mt-1 w-full" type="password"
                                name="old_password" required autocomplete="current-password"
                                placeholder="Enter current password" />
                            <x-input-error :messages="$errors->get('old_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="new_password" :value="__('New Password')" />
                            <x-text-input id="new_password" class="block mt-1 w-full" type="password"
                                name="new_password" required autocomplete="new-password"
                                placeholder="Enter new password" />
                            <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="confirm_password" :value="__('Confirm New Password')" />
                            <x-text-input id="confirm_password" class="block mt-1 w-full" type="password"
                                name="confirm_password" required autocomplete="new-password"
                                placeholder="Re-enter new password" />
                            <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
                        </div>

                        <div class="pt-4">
                            <x-primary-button class="w-full justify-center py-4 text-lg">
                                {{ __('Update Password') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
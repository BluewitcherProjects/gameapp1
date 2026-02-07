<x-app-layout>
    <x-slot name="header">
        {{ __('Bank Settings') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
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
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Bank Information</h2>
                        <p class="text-metallic-silver text-sm">Update your bank details for withdrawals.</p>
                    </div>

                    <form method="POST" action="{{ route('setup.gateway.submit') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="realname" :value="__('Account Holder Name')" />
                            <x-text-input id="realname" class="block mt-1 w-full" type="text" name="realname"
                                :value="old('realname', user()->realname)" required autofocus
                                placeholder="Enter full name as per bank" />
                            <x-input-error :messages="$errors->get('realname')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="bank_name" :value="__('Bank Name')" />
                            <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name"
                                :value="old('bank_name', user()->bank_name)" required
                                placeholder="e.g. State Bank of India" />
                            <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="gateway_number" :value="__('Account Number')" />
                            <x-text-input id="gateway_number" class="block mt-1 w-full" type="text"
                                name="gateway_number" :value="old('gateway_number', user()->gateway_number)" required
                                placeholder="Enter account number" />
                            <x-input-error :messages="$errors->get('gateway_number')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="ifsc" :value="__('IFSC Code')" />
                            <x-text-input id="ifsc" class="block mt-1 w-full" type="text" name="ifsc"
                                :value="old('ifsc', user()->ifsc)" required placeholder="Enter IFSC code" />
                            <x-input-error :messages="$errors->get('ifsc')" class="mt-2" />
                        </div>

                        <div class="pt-4">
                            <x-primary-button class="w-full justify-center py-4 text-lg">
                                {{ __('Update Bank Details') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
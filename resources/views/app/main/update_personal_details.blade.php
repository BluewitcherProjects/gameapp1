<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Profile') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-card class="bg-primary-midnight/50 backdrop-blur-md overflow-hidden">
                <div class="p-6">
                    <form method="POST" action="{{ route('user.personal-details-submit') }}"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Avatar (To be implemented properly if upload logic exists) -->
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div
                                    class="w-24 h-24 rounded-full bg-white/10 p-1 border border-white/20 overflow-hidden">
                                    <img src="{{ user()->photo ? asset(user()->photo) : asset('pic/head1.jpg') }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <label for="photo"
                                    class="absolute bottom-0 right-0 bg-accent-gold p-1.5 rounded-full cursor-pointer hover:bg-yellow-400 transition-colors">
                                    <svg class="w-4 h-4 text-primary-dark" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <input type="file" name="photo" id="photo" class="hidden">
                                </label>
                            </div>
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Full Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="user()->name ?? old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email Address')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="user()->email" readonly class="opacity-50 cursor-not-allowed" />
                            <p class="text-xs text-metallic-silver mt-1">Email cannot be changed.</p>
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('Phone Number')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="user()->phone" readonly class="opacity-50 cursor-not-allowed" />
                            <p class="text-xs text-metallic-silver mt-1">Phone number cannot be changed.</p>
                        </div>

                        <div class="pt-4">
                            <x-primary-button class="w-full justify-center py-4 text-lg">
                                {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
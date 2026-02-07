<x-guest-layout>
    <div x-data="registerForm()" class="w-full">
        <!-- Premium Header/Banner -->
        <div
            class="relative h-32 -mt-6 -mx-6 mb-8 bg-hero-gradient overflow-hidden rounded-t-xl flex items-center justify-center">
            <div class="absolute inset-0 bg-primary-midnight/60 backdrop-blur-xs"></div>
            <div class="absolute inset-0 bg-linear-to-t from-primary-midnight via-transparent to-transparent"></div>

            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full opacity-30">
                <div
                    class="absolute left-0 top-0 w-32 h-32 bg-accent-gold/20 blur-3xl rounded-full -translate-x-10 -translate-y-10">
                </div>
                <div
                    class="absolute right-0 bottom-0 w-24 h-24 bg-accent-cyan/20 blur-2xl rounded-full translate-x-5 translate-y-5">
                </div>
            </div>

            <!-- Logo & Title -->
            <div class="relative z-10 text-center flex flex-col items-center">
                <div
                    class="w-12 h-12 mb-2 rounded-full bg-linear-to-br from-accent-cyan to-blue-500 flex items-center justify-center shadow-lg shadow-accent-cyan/30 border-2 border-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white drop-shadow-md" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white tracking-wide drop-shadow-md font-heading">Create Account</h2>
                <p class="text-metallic-silver text-xs font-medium tracking-wider uppercase mt-1">Join Our Community</p>
            </div>
        </div>

        <form @submit.prevent="submitForm" class="space-y-4 px-2">
            <!-- Mobile Number -->
            <div class="relative group">
                <label class="block text-xs font-medium text-metallic-silver mb-1 ml-1">Mobile Number</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-metallic-silver group-focus-within:text-accent-cyan transition-colors duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <input type="text" x-model="formData.phone"
                        class="block w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-metallic-silver/30 focus:outline-hidden focus:ring-2 focus:ring-accent-cyan/50 focus:border-accent-cyan/50 transition-all duration-300 sm:text-sm shadow-inner"
                        placeholder="Enter mobile number" required>
                </div>
            </div>

            <!-- Password -->
            <div class="relative group">
                <label class="block text-xs font-medium text-metallic-silver mb-1 ml-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-metallic-silver group-focus-within:text-accent-gold transition-colors duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password" x-model="formData.password"
                        class="block w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-metallic-silver/30 focus:outline-hidden focus:ring-2 focus:ring-accent-gold/50 focus:border-accent-gold/50 transition-all duration-300 sm:text-sm shadow-inner"
                        placeholder="Enter password" required>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="relative group">
                <label class="block text-xs font-medium text-metallic-silver mb-1 ml-1">Confirm Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-metallic-silver group-focus-within:text-accent-gold transition-colors duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <input type="password" x-model="formData.confirm_password"
                        class="block w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-metallic-silver/30 focus:outline-hidden focus:ring-2 focus:ring-accent-gold/50 focus:border-accent-gold/50 transition-all duration-300 sm:text-sm shadow-inner"
                        placeholder="Confirm password" required>
                </div>
            </div>

            <!-- Withdrawal Password -->
            <div class="relative group">
                <label class="block text-xs font-medium text-metallic-silver mb-1 ml-1">Withdrawal Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-metallic-silver group-focus-within:text-red-400 transition-colors duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <input type="password" x-model="formData.withdraw_password"
                        class="block w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-metallic-silver/30 focus:outline-hidden focus:ring-2 focus:ring-red-500/50 focus:border-red-500/50 transition-all duration-300 sm:text-sm shadow-inner"
                        placeholder="Set withdrawal password" required>
                </div>
            </div>

            <!-- Invite Code -->
            <div class="relative group">
                <label class="block text-xs font-medium text-metallic-silver mb-1 ml-1">Invite Code</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-metallic-silver group-focus-within:text-accent-purple transition-colors duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <input type="text" x-model="formData.ref_by"
                        class="block w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-metallic-silver/30 focus:outline-hidden focus:ring-2 focus:ring-accent-purple/50 focus:border-accent-purple/50 transition-all duration-300 sm:text-sm shadow-inner"
                        placeholder="Invitation code (Optional)" value="{{ $ref_by ?? '' }}">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" :disabled="loading"
                class="w-full mt-6 flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg shadow-accent-cyan/20 text-sm font-bold text-white bg-linear-to-r from-accent-cyan to-blue-600 hover:from-accent-cyan hover:to-blue-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-accent-cyan disabled:opacity-50 disabled:cursor-not-allowed transform active:scale-95 transition-all duration-300 uppercase tracking-wider relative overflow-hidden group">
                <span
                    class="absolute inset-0 w-full h-full bg-linear-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-in-out"></span>
                <span x-show="!loading" class="flex items-center">
                    REGISTER NOW
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </span>
                <span x-show="loading" class="flex items-center" style="display: none;">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Processing...
                </span>
            </button>
        </form>

        <!-- Login Link -->
        <div class="mt-6 text-center">
            <p class="text-metallic-silver text-sm">
                Already have an account?
                <a href="{{ url('login') }}"
                    class="font-bold text-accent-gold hover:text-white transition-colors duration-200 ml-1">
                    Login Here
                </a>
            </p>
        </div>
    </div>

    <!-- Alert Component -->
    <div x-data="{ show: false, message: '', type: 'success' }"
        @notify.window="show = true; message = $event.detail.message; type = $event.detail.type; setTimeout(() => show = false, 3000)"
        x-show="show" x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed top-4 right-4 z-50 max-w-sm w-full shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden"
        :class="type === 'success' ? 'bg-emerald-900/90 border border-emerald-500/50' : 'bg-red-900/90 border border-red-500/50'"
        style="display: none;">
        <div class="p-4">
            <div class="flex items-start">
                <div class="shrink-0">
                    <svg x-show="type === 'success'" class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg x-show="type === 'error'" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-white" x-text="message"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function registerForm() {
            return {
                formData: {
                    phone: '',
                    password: '',
                    confirm_password: '',
                    withdraw_password: '',
                    ref_by: '{{ $ref_by ?? "" }}'
                },
                loading: false,
                submitForm() {
                    this.loading = true;
                    fetch("{{ url('register') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(this.formData)
                    })
                        .then(response => response.json())
                        .then(data => {
                            this.loading = false;
                            if (data.status === true) {
                                window.dispatchEvent(new CustomEvent('notify', { detail: { message: data.message || 'Registration Successful!', type: 'success' } }));
                                setTimeout(() => {
                                    window.location.href = "{{ url('dashboard') }}";
                                }, 1500);
                            } else {
                                window.dispatchEvent(new CustomEvent('notify', { detail: { message: data.message || 'Registration failed', type: 'error' } }));
                            }
                        })
                        .catch(error => {
                            this.loading = false;
                            window.dispatchEvent(new CustomEvent('notify', { detail: { message: 'An error occurred. Please try again.', type: 'error' } }));
                            console.error('Error:', error);
                        });
                }
            }
        }
    </script>
</x-guest-layout>
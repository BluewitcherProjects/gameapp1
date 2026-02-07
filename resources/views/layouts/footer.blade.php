<footer class="bg-primary-midnight/50 backdrop-blur-md border-t border-white/10 mt-auto">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-1">
                <x-application-logo class="h-10 w-auto fill-current text-accent-gold mb-4" />
                <p class="text-sm text-metallic-silver">
                    Experience luxury and performance with our premium automotive services.
                </p>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-accent-cyan tracking-wider uppercase">Services</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="#" class="text-base text-metallic-platinum hover:text-white">Mining</a></li>
                    <li><a href="#" class="text-base text-metallic-platinum hover:text-white">Investments</a></li>
                    <li><a href="#" class="text-base text-metallic-platinum hover:text-white">Consulting</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-accent-cyan tracking-wider uppercase">Company</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="{{ route('about') }}"
                            class="text-base text-metallic-platinum hover:text-white">About</a></li>
                    <li><a href="{{ route('user.service') }}"
                            class="text-base text-metallic-platinum hover:text-white">Contact</a></li>
                    <li><a href="{{ route('rule') }}" class="text-base text-metallic-platinum hover:text-white">Privacy
                            & Rules</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-accent-cyan tracking-wider uppercase">Connect</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="#" class="text-base text-metallic-platinum hover:text-white">Twitter</a></li>
                    <li><a href="#" class="text-base text-metallic-platinum hover:text-white">LinkedIn</a></li>
                    <li><a href="#" class="text-base text-metallic-platinum hover:text-white">Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 border-t border-white/10 pt-8">
            <p class="text-base text-metallic-silver text-center">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </div>
</footer>
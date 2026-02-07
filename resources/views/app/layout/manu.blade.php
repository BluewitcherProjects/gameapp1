{{--@if(\Request::route()->getName() == 'dashboard')--}}
<div class="footerbar">
    <div class="Home" data-nav-url='{{route('dashboard')}}'><img
            src="{{asset('pic/icon/house.png')}}"><span>Home</span></div>
    <div class="Invite" data-nav-url='{{route('user.invite')}}'><img
            src="{{asset('pic/icon/letter.png')}}"><span>Invite</span></div>
    <div class="Team" data-nav-url='{{route('user.team')}}'><img
            src="{{asset('pic/icon/partners.png')}}"><span>Team</span></div>
    <div class="Personal" data-nav-url='{{route('profile')}}'><img
            src="{{asset('pic/icon/paw.png')}}"><span>Mine</span></div>
</div>
<script>
// Navigation throttling to prevent 429 errors
(function() {
    let isNavigating = false;
    let lastNavigationTime = 0;
    const NAVIGATION_DELAY = 500; // 500ms delay between navigations

    function throttledNavigate(url) {
        const now = Date.now();
        
        // Prevent navigation if already navigating or within delay period
        if (isNavigating || (now - lastNavigationTime) < NAVIGATION_DELAY) {
            console.log('Navigation throttled');
            return false;
        }

        isNavigating = true;
        lastNavigationTime = now;
        window.location.href = url;
        return true;
    }

    // Add click handler to all navigation elements
    document.addEventListener("DOMContentLoaded", () => {
        // Handle footer menu navigation
        document.querySelectorAll('[data-nav-url]').forEach(element => {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('data-nav-url');
                if (url) {
                    throttledNavigate(url);
                }
            });
        });

        // Style override script
        document.querySelectorAll("*").forEach(el => {
            const style = window.getComputedStyle(el);

            if (style.color === "rgb(15, 180, 15)") {
                el.style.color = "#000000";
            }

            if (style.backgroundColor === "rgb(15, 180, 15)") {
                el.style.backgroundColor = "#000000";
            }

            if (style.borderColor === "rgb(15, 180, 15)") {
                el.style.borderColor = "#000000";
            }
        });
    });
})();
</script>


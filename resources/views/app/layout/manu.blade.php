{{--@if(\Request::route()->getName() == 'dashboard')--}}
<div class="footerbar">
    <div class="Home" onclick="window.location.href='{{route('dashboard')}}'"><img
            src="{{asset('pic/icon/house.png')}}"><span>Home</span></div>
    <div class="Invite" onclick="window.location.href=`{{route('user.invite')}}`"><img
            src="{{asset('pic/icon/letter.png')}}"><span>Invite</span></div>
    <div class="Team" onclick="window.location.href=`{{route('user.team')}}`"><img
            src="{{asset('pic/icon/partners.png')}}"><span>Team</span></div>
    <div class="Personal" onclick="window.location.href='{{route('profile')}}'"><img
            src="{{asset('pic/icon/paw.png')}}"><span>Mine</span></div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
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
</script>


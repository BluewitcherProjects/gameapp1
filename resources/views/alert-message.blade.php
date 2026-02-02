<script src="{{asset('assets/toast.js')}}"></script>
<script>
    @if(session()->has('success'))
    message('{{session()->get('success')}}')
    @endif

    @if(session()->has('error'))
    message('{{session()->get('error')}}')
    @endif

    @if(session()->has('message'))
    message('{{session()->get('message')}}')
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    message('{{session()->get($error)}}')
    @endforeach
    @endif
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("*").forEach(el => {
    const style = window.getComputedStyle(el);

    // text color check
    if (style.color === "rgb(15, 180, 15)") {
      el.style.color = "#000000";
    }

    // background color check
    if (style.backgroundColor === "rgb(15, 180, 15)") {
      el.style.backgroundColor = "#000000";
    }

    // border color check (optional)
    if (style.borderColor === "rgb(15, 180, 15)") {
      el.style.borderColor = "#000000";
    }
  });
});
</script>


<header class="c-header d-flex align-items-center p-4 justify-content-between">
    <h4><a href="/" class="text-decoration-none text-white">Poke Api</a></h4>
    <div class="d-flex flex-row align-items-center justify-content-center">
        <h5 ><a href="{{\Auth::check() ? '/Logout' : '/Login'}}" class="text-decoration-none text-white">{{\Auth::check() ? \Auth::user()->name.'  Logout' : 'Login' }}</a></h5>

        @if(!\Auth::check())
            <h5 class="mx-3"><a href="/Register" class="text-decoration-none text-white">SignUp</a></h5>
        @endif
    </div>
</header>

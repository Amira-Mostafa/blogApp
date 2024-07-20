<nav class="navbar sticky-top navbar-expand-lg bg-white navbar-light sticky-top">
    <div class="nav-brand">
        <a href="{{ route('home') }}">blogApp</a>
    </div>
    <div class="nav-left">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('createPost') }}">Create</a>
        <a href="{{ route('myPosts') }}">MyPosts</a>
    </div>
    <div class="search-container">
        <form action="{{ route('search') }}" method="get">
            <div>

            </div>
            <input type="text" class="search-input" name="query" placeholder="Search..." value="{{ request()->input('query') }}">

            <button type="submit" class="bg-white border-0">
                <img src="https://cdn-icons-png.flaticon.com/512/54/54481.png" alt="Search" class="search-icon" width="20">
            </button>
        </form>
    </div>
    <div class="nav-right">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <a href="{{ route('login') }}">{{ __('Login') }}</a>
        @endif

        @if (Route::has('register'))
        <a href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
        @else
        <a href="" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->username }}
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endguest
    </div>
</nav>
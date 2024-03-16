<header class="main-header py-6 px-12 text-xl">
    <div class="flex flex-row gap-12 items-center justify-between">
        <div class="flex gap-6 items-center">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo Booknote Archive">
            <h3 class="font-bold leading-none ">Booknote <br> Archive</h3>
        </div>

        <div class="md:hidden">
            <button id="menuToggle" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>

        <div class="hidden md:flex flex-row-reverse gap-2 items-center" id="menu">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <button class="px-20 py-2 font-bold border-4 border-white">
                            Sign out
                        </button>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <button class="px-20 py-2 font-bold bg-white text-black">
                            Login
                        </button>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <button class="px-20 py-2 font-bold">
                                Register
                            </button>
                        </a>
                        <a href="#">
                            <button class="px-20 py-2 font-bold">
                                FAQ
                            </button>
                        </a>
                        <a href="#">
                            <button class="px-20 py-2 font-bold">
                                Tutorial
                            </button>
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
    <script src="{{ asset('js/mobileMenu.js') }}"></script>

</header>

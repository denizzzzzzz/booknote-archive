<header class=" {{ request()->routeIs('register') || request()->routeIs('login') || request()->routeIs('password.request') ? 'register-header-bg' : '' }}">
    <div class="main-header" x-data="{ isOpen: false }" :class="{'active-header-mobile': isOpen}">
        <div class="flex items-center justify-between p-4 md:hidden">
            <a href="/">
                <div class="flex gap-6 items-center">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo Booknote Archive">
                    <h5 class="font-light leading-none ">Booknote <br> Archive</h5>
                </div>
            </a>

            <button @click="isOpen = !isOpen" class="md:hidden block">
                <i x-show="!isOpen" class="fa-solid fa-bars"></i>
                <i x-show="isOpen" class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="hidden md:flex flex-row justify-between items-center gap-2">
            <a href="/">
                <div class="flex gap-6 items-center">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo Booknote Archive">
                    <h5 class="font-light leading-none ">Booknote <br> Archive</h5>
                </div>
            </a>
            <div class="flex flex-row gap-2">
                @if (Route::has('login'))
                @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button class="px-20 py-2  bg-[#252525] hover:bg-white hover:text-black border-2 text-white">
                        Sign out
                    </button>
                </a>
                <a href="{{ route('library') }}">
                    <button class="px-20 py-2 bg-[#01a262] border-2 hover:bg-white hover:text-black  text-white">
                        My Library
                    </button>
                </a>

                @else
                @if (Route::has('register'))

                <a href="{{ route('register') }}">
                    <button class="px-20 py-2">
                        Register
                    </button>
                </a>
                @endif
                <a href="{{ route('login') }}">
                    <button class="px-20 py-2 bg-white text-black">
                        Login
                    </button>
                </a>
                @endauth
                @endif
            </div>
        </div>

        <div x-show="isOpen" class="pt-12 flex flex-col gap-2  justify-around text-center w-full mx-auto">
            @if (Route::has('login'))
            @auth
            <div class="flex flex-col w-2/3 mx-auto gap-2 justify-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button class="px-6 w-full mb-6 py-2 bg-[#252525] border-2 text-white">
                        Sign out
                    </button>
                </a>
                <a href="{{ route('library') }}">
                    <button class="px-6 w-full mb-6 py-2 bg-[#01a262] border-2 text-white">
                        My Library
                    </button>
                </a>
            </div>
            @else
            @if (Route::has('register'))
            <div class="flex flex-col w-2/3 mx-auto gap-2 justify-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('register') }}">
                    <button class="px-6 w-full mb-6 py-2 font-bold bg-[#252525] border-2 text-white">
                        Register
                    </button>
                </a>
                @endif
                <a href="{{ route('login') }}">
                    <button class="px-6 w-full mb-6 py-2 font-bold bg-white border-2 text-black">
                        Login
                    </button>
                </a>
            </div>
            @endauth
            @endif
        </div>
    </div>
</header>
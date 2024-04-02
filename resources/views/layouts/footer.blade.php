<footer class="mx-6 ">
    <div class="book-edge">
        <div class="h-1 bg-[#434343]"></div>
        <div class="h-1 bg-[#696868]"></div>
        <div class="h-1 bg-[#434343]"></div>
        <div class="h-1 bg-[#696868]"></div>
        <div class="h-1 bg-[#434343]"></div>
        <div class="h-1 bg-[#696868]"></div>
    </div>

    <div class="p-6 bg-black text-white">
        <div class="flex flex-col items-center justify-between min-h-48">
            <a href="/">
                <div class="flex gap-6 items-center">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo Booknote Archive">
                    <h4 class="font-light leading-none ">Booknote <br> Archive</h3>
                </div>
            </a>
            <aside>
                <p class="text-sm text-center text-[#808080]">© {{ now()->year }} - Booknote Archive</p>
            </aside>
        </div>
</footer>
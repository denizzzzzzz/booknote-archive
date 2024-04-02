@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span class="py-2 px-3 leading-tight text-black bg-[#adb5bd] border border-[#adb5bd] cursor-not-allowed mr-2 opacity-50"><i class="fa-solid fa-angle-left"></i></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="py-2 px-3 leading-tight text-black mr-2 bg-[#adb5bd] border border-[#adb5bd] hover:bg-gray-700 hover:text-white"><i class="fa-solid fa-angle-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                 @if (is_string($element))
                    <li class="disabled"><span class="py-2 px-3 leading-tight text-white bg-black border border-black opacity-50">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="py-2 px-3 leading-tight text-black border-2 bg-white  border-white">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="py-2 px-3 leading-tight text-white bg-[#adb5bd] border-2 border-[#adb5bd] hover:bg-gray-700 hover:text-white">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="py-2 px-3 ml-2 leading-tight text-black bg-[#adb5bd] border border-[#adb5bd] hover:bg-gray-700 hover:text-white"><i class="fa-solid fa-angle-right"></i></a>
                </li>
            @else
                <li class="disabled">
                    <span class="py-2 px-3 leading-tight text-black bg-[#adb5bd] ml-2 border border-[#adb5bd] cursor-not-allowed opacity-50"><i class="fa-solid fa-angle-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif

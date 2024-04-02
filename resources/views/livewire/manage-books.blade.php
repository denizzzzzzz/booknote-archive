<div>
    <div>
        @if (session()->has('message'))
        <div class="alert alert-info w-2/3 md:w-1/3 mx-auto mt-6">
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-none bg-green-50 " role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium"> {{ session('message') }}</span>
                </div>
            </div>

        </div>
        @endif
    </div>
    <div class="book-container p-4">
        <div class="books">
            @if($books->isEmpty())
            <div class="text-center w-full my-12 ">
                <p class=" text-white">Your books would go here, add your first book with the button below</p>
            </div>
            @else
            <div class="flex flex-wrap-reverse w-full md:gap-2">
                @foreach($books as $book)
                <div class="group w-full md:w-1/5">

                    <div class="hover-book flex justify-between border-t-2 border-[#00000052] items-center bg-white hover:bg-[#01A262] hover:text-white pl-4 text-black">
                        <a href="{{ route('show_notes', ['id' => $book->id]) }}">
                            <h5>
                                <span class="block md:hidden">
                                    @if(strlen($book->title) > 28)
                                    {{ substr($book->title, 0, 28) }}..
                                    @else
                                    {{ $book->title }}
                                    @endif
                                </span>
                                <span class="hidden md:block">
                                    @if(strlen($book->title) > 8)
                                    {{ substr($book->title, 0, 8) }}..
                                    @else
                                    {{ $book->title }}
                                    @endif
                                </span>
                            </h5>

                        </a>
                        <button wire:click="deleteBook({{ $book->id }})" class="px-4 py-2 text-[#00000046] hover:text-red-600">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="shelf"></div>
        <div class="shelf-depth mb-10"></div>
        <div class="w-full flex flex-col items-center justify-center mb-12">
            {{ $books->links() }}
        </div>
        <div>

            <div class="text-center flex justify-center w-full">
                <button wire:click="toggleModal(true)" class="px-14 py-2 bg-[#01a262] hover:bg-white hover:text-black  text-white border-2">Add Book</button>
            </div>

            @if($open)
            <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
                <div class="bg-[#252525] w-full md:w-2/3 shadow-lg p-6">
                    <div class="flex justify-between items-center pb-3">
                        <h3 class=" text-white">
                            Add your book
                        </h3>
                        <i wire:click="toggleModal(false)" class="fa-solid fa-xmark text-white cursor-pointer z-50"></i>
                    </div>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div>
                            <span class="font-medium">{{ $error }}<br></span>
                        </div>
                    </div>
                    @endforeach
                    @endif


                    <form wire:submit.prevent="saveBook" class="p-4">
                        @csrf
                        <div class="mb-10">
                            <h3 class="text-xl text-white mb-2">Book Title</h3>
                            <input wire:model="title" name="title" type="text" class="w-full" placeholder="Book Title" />
                        </div>
                        <div>
                            <div class="mb-12">
                                <p class=" text-white mb-2">Author or Description</p>
                                <input wire:model="description" name="title" type="text" class="w-full" placeholder="Description or author" />
                            </div>
                        </div>
                        <button type="submit" class="px-20 py-2 bg-[#01A262] text-white text-lg md:text-xl font-bold w-full">Save Book</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
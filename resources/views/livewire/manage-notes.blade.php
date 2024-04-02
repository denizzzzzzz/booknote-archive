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

    <div class="notes-container">
        <nav class="bg-black p-4 ">
            <div class="flex flex-wrap gap-2  md:flex md:gap-4">
                @foreach($categories as $category)
                <div class="cursor-pointer rounded-none shadow-lg {{ $category->id == $selectedCategoryId ? ' bg-[#ffffffe6] text-black' : 'text-white bg-[#ffffff48]' }}" wire:click="selectCategory({{ $category->id }})">
                    <a class="flex items-center justify-center  px-6 md:px-12 ">
                        <p>
                            {{ $category->title }}
                        </p>
                    </a>
                </div>
                @endforeach

                <button wire:click="toggleCategoryInput" class=" px-6 md:px-12 bg-[#ffffff48] text-[#ffffffd8] border-2-[#01a2627a] rounded-none shadow-lg  md:ml-auto">
                    <p> New Category <i class="fa-solid fa-plus text-sm"></i></p>
                </button>
            </div>

            @if($showCategoryInput)
            <div class="flex items-center justify-center gap-2 mt-4">
                <input wire:model="newCategoryName" type="text" class="w-auto py-2 px-3" placeholder="Category Name">
                <button wire:click="saveCategory" class="px-4 py-2 bg-[#01a262] text-white">Save</button>
            </div>
            @endif
        </nav>
        <div>
            <div class="notes-display">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 p-10">
                    @forelse($notes as $note)
                    <div class="text-black">
                        <a class="block p-6 bg-white border border-gray-200 rounded-none">
                            <div class=" flex justify-end">
                                <button wire:click="deleteNote({{ $note->id }})"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <h5>{{ $note->title }}</h5>
                            <p class="font-normal"> {!! $note->content !!}</p>
                            <div class=" flex justify-end">
                                <button wire:click="editNote({{ $note->id }})" class="text-sm text-black"><i class="fa-solid fa-pen"></i></button>
                            </div>
                        </a>

                    </div>
                    @empty
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-auto">
                        <div class="text-[#ffffff49] text-center">
                            <h4 class="font-medium">Your notes will be here..</h4>
                            <p class="font-light">Add one with the button below</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <div class="flex justify-center mb-2">
                    {{ $notes->links() }}
                </div>
                <div>
                    <div class="text-center flex justify-center w-full mt-10">
                        <button wire:click="toggleModal(true)" class="px-8 md:px-20 py-2 bg-white text-black border-2 mt-10 mb-10">New Note <i class="fa-solid fa-plus text-sm"></i></button>
                    </div>

                    @if($open)
                    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
                        <div class="bg-[#252525] w-full md:w-2/3 shadow-lg p-6">
                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl text-white font-bold">
                                    @if($editingNoteId)
                                    Edit your note
                                    @else
                                    Add your note
                                    @endif
                                </p>
                                <i wire:click="toggleModal(false)" class="fa-solid fa-xmark text-white cursor-pointer z-50"></i>
                            </div>

                            <form wire:submit.prevent="saveNote" class="p-4">
                                @csrf
                                <div class="mb-10">
                                    <h3 class="text-xl text-white mb-2">Note Title</h3>
                                    <input wire:model="title" name="title" type="text" class="w-full" placeholder="Book Title" required />
                                </div>
                                <div>
                                    <div class="mb-10">
                                        <h3 class="text-xl text-white mb-2">Upload your note or take a picture</h3>
                                        <input wire:model="image" class="block w-full md:w-1/3 text-lg text-gray-900 border border-gray-300 rounded-none cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" accept="image/*" capture>
                                    </div>

                                    <input hidden type="text" name="content" id="content" value="{{ $recognizedText }}" required />
                                    <div wire:loading class="w-full">
                                        <div class="w-fit mx-auto my-48">
                                            <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-green-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                                            </svg>
                                        </div>
                                    </div>
                                    @if($editingNoteId)
                                    <div class="mb-4">
                                        <label for="category" class="block mb-2 text-sm font-medium text-white">Category</label>
                                        <select wire:model="selectedCategoryId" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="">Select a category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

                                    <div wire:loading.remove>
                                        <trix-editor wire:model="content" class="trix-content richt-editor bg-white text-black text-lg mb-12 rounded-none" input="content"></trix-editor>
                                    </div>
                                </div>
                                <input type="hidden" name="book_id" value="{{ $bookId }}">
                                <button type="submit" class="px-20 py-2 bg-[#01A262] text-white text-lg md:text-xl font-bold w-full">Save Note</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
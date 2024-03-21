<div>
    <input type="file" class="file-input w-full mb-6"  wire:model="image" />

    <button type="button" wire:click="recognizeHandwriting" wire:loading.attr="disabled" 
    
    class="px-20 py-2 bg-[#8a8a8a] text-white text-2xl font-bold w-full mb-12">
    Upload & Recognize Text
    <span wire:loading wire:target="recognizeHandwriting" class="loading loading-ball loading-xl">
    </span>
</button>


<input type="hidden" name="content" id="content" value="{{ $recognizedText }}" />

<trix-editor class="trix-content bg-white text-black text-2xl mb-12 rounded-none" input="content"></trix-editor>

</div>

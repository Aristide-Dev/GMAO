<div class="p-3 my-3 bg-white rounded shadow col-12">
    <div class="flex flex-col gap-2">
        @if ($canSync)
        <button 
            wire:loading.disabled 
            wire:click='syncRemoteDatabase' 
            wire:loading.class='font-bold text-black bg-gray-400 hover:bg-gray-500 animate-pulse'
            wire:loading.class.remove='text-white bg-orange-400 bg-orange-500' 
            wire:target='syncRemoteDatabase' 
            class="text-white bg-orange-400 shadow w-50 sm:w-80 btn hover:bg-orange-500 shadow-red-600"
        >
            Sync Remote Database
        </button>
    @else
        <p class="text-danger">This command can only be run in a local environment.</p>
    @endif
    <hr class="w-full border-2 border-blue-300">
    
    @if ($message)
        <div class="mt-3 font-bold text-white bg-gray-500 alert">
            <pre>{{ $message }}</pre>
        </div>
    @endif
    </div>
</div>

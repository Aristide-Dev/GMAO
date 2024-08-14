<div class="row">
    <div class="col-12">
        @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    </div>
    <div class="p-3 mx-2 my-3 bg-white col-12">

        <div class="flex justify-between">
            <div class="p-3 bg-gray-300 rounded">
                <form wire:submit.prevent="importExcel" enctype="multipart/form-data" class="flex">
                    <div class="mb-3">
                        <input type="file" wire:model="importFile" class="form-control">
                    </div>
                    <div class="flex justify-between gap-3">

                        <div wire:loading class="spinner-border text-primary border-3" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        
                        <button class="btn btn-primary" wire:loading.disabled>Importer Equipements</button>
                    </div>
                </form>
                @error('importFile') <small class="my-2 font-bold text-red-500">{{ $message }}</small> @enderror
            </div>


            <div>
                <button wire:click="exportExcel" class="btn-success btn">
                    Expoter Equipements
                </button>
            </div> 
        </div>
    </div>
</div>


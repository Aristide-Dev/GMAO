<div class="row">
    <div class="border col-md-7">
        <p class="mb-3 font-bold">Liste des affectations</p>

        @forelse ($user->demandeur_sites as $affectation)
            <div class="flex gap-2">
                <p>{{ $affectation->name }}</p>
                <button wire:click='remove({{ $affectation->id }})'>
                    <i class="fa-solid fa-xmark" style="color: #e80000;"></i>
                </button>
            </div>
        @empty
            <p>Aucune affectation</p>
        @endforelse
    </div>
    
    <div class="border shadow col-md-5">
        <p class="mb-3 font-bold">Affecter à un site</p>

        <form wire:submit.prevent='affecter'>
            <div class="mb-3">
                <label class="h6" for="selectedSites">Sélectionner un ou plusieurs sites</label>
                <select id="selectedSites" name="selectedSites" class="rounded-lg form-control select2 priority-select" wire:model.defer="selectedSites" multiple>
                    @forelse ($sites as $site)
                        <option value="{{ $site->id }}">
                            {{ $site->name }}
                        </option>
                    @empty
                        <option value="">Aucun site trouvé...</option>
                    @endforelse
                </select>
                <x-input-error for="selectedSites" class="mt-2" />
            </div>

            <div class="mb-3">
                <button class="text-white bg-green-500 btn hover:bg-green-600">Valider</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            $('.select2').select2();
            $('.select2').on('change', function () {
                @this.set('selectedSites', $(this).val());
            });
        });
    
        // Reinitialiser Select2 lors du rafraîchissement du composant Livewire
        Livewire.hook('message.processed', (message, component) => {
            $('.select2').select2();
        });
    </script>
</div>

<div class="row">
    <div class="p-3 mx-2 my-3 {{ $site->actif ? 'bg-white' : 'bg-red-100 animate-pulse' }} col-12">
        <p class="m-2 font-bold">{{ $site->actif ? 'Site activé' : 'Site désactivé' }}</p>

        <button wire:click="switchStatus" class="{{ $site->actif ? 'btn-danger' : 'btn-success' }} btn">
            {{ $site->actif ? 'Désactiver' : 'Activer' }} le site ?
        </button>
    </div>
</div>


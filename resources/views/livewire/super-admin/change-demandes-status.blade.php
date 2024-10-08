<div class="p-3 my-3 bg-white rounded shadow col-12">
  <p>demandes_need_change: {{ count($demandes_need_change) }}</p>
  @if (count($demandes_need_change) > 0)
  <div class="flex items-center p-4 mb-4 text-sm text-red-800 bg-red-300 rounded-lg " role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="flex items-center justify-between w-full gap-2">
        <p class="w-3/4 text-xl font-bold">
          <span class="font-medium">Alerte!</span><br>
         Status conflictuel rencontré sur {{ count($demandes_need_change) }} demandes d'intervention
        </p>
        <button wire:loading.attr="disabled" wire:click="setCloture" class="w-1/4 text-white bg-yellow-500 btn hover:bg-yellow-600">
          Changer Tous les status en "Clôturé"
        </button>
      </div>
    </div>
  @endif
  <hr>

  <p>demandes_has_anuller_or_others: {{ count($demandes_has_anuller_or_others) }}</p>
  @if (count($demandes_has_anuller_or_others) > 0)
  <div class="flex items-center p-4 mb-4 text-sm text-red-800 bg-red-300 rounded-lg " role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="flex items-center justify-between w-full gap-2">
        <p class="w-3/4 text-xl font-bold">
          <span class="font-medium">Alerte!</span><br>
         Status conflictuel rencontré sur {{ count($demandes_has_anuller_or_others) }} demandes d'intervention
        </p>
        <button wire:loading.attr="disabled" wire:click="changeOthersStatus" class="w-1/4 text-white bg-yellow-500 btn hover:bg-yellow-600">
          Changer Tous les status en "Affectée Travaux"
        </button>
      </div>
    </div>
  @endif
</div>

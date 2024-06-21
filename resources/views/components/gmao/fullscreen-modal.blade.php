@props(['btn_title' => 'voir +','modal_title' => 'Modal title','bon_travail' => null])

@php
    $modal_full_screen_id = rand(800,8000);
@endphp
<div class="relative col-12">
     <!-- Extra Large Modal -->
     
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal-{{ $modal_full_screen_id }}">
        {{ $btn_title }}
      </button>
      
     <div class="modal fade bg-black/50" id="exLargeModal-{{ $modal_full_screen_id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="bg-gray-100 modal-header">
              <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
              <button type="button" class="text-white bg-red-400 btn hover:bg-red-500" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
             {{ $slot }}
            </div>
            <div class="bg-gray-100 modal-footer">
              <button type="button" class="text-white bg-red-400 btn hover:bg-red-500" data-bs-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>
</div>
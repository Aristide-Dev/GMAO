@props(['rapport_remplacement_piece', 'status_color' => ''])

<div class="p-3 m-0 mb-3 border rounded shadow-sm">
    <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge" style="background-color: {{ $status_color }}; opacity:0.5;">
        rapport de remplacement de piece
    </div>

    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Document
                    </h6>
                </div>
                <img src="{{ $rapport_remplacement_piece->document() }}" alt="document" class="mb-1 rounded w-50" id="doc_image_url_in_show_rapport_intervention" onclick="displayImageInModal('doc_image_url_in_show_rapport_intervention', 'myShowDemandeModal')" width="100">
            </div>

            @if ($rapport_remplacement_piece->commentaire)
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Description (commentaire)
                    </h6>
                    <p class="mx-3 px-2 text-dark">{{ $rapport_remplacement_piece->commentaire }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

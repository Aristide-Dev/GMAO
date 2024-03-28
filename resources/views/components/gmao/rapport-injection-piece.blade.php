@props(['injection_piece' => '', 'status_color'])



<div class="p-3 m-0 mb-3 border rounded shadow-sm">
    <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge" style="background-color: {{ $status_color }}; opacity:0.5;">
        INJECTION DE PIECE DE RECHANGE
    </div>

    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-block w-100 justify-content-start">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Piece & Quantité
                    </h6>
                    <small class="mb-1 w-30">{{ $injection_piece?$injection_piece?->piece->name:"" }} x{{ $injection_piece?$injection_piece?->quantite:"" }}</small>
                </div>

                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Details
                    </h6>
                    <small class="mb-1 w-30">{{ $injection_piece?$injection_piece?->piece->name:"" }}</small>
                </div>
            </div>
        </div>
    </div>
</div>


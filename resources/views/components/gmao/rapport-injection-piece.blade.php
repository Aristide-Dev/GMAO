@props(['injection_piece' => '', 'status_color'])



<div class="p-3 m-0 mb-3 border rounded shadow-sm">
    <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge" style="background-color: {{ $status_color }}; opacity:0.5;">
        INJECTION DE PIECE DE RECHANGE
    </div>

    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="p-1 border-0 list-group-item list-group-item-action d-block align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Piece & Quantité
                    </h6>
                    <small class="mb-1 w-30">{{ $injection_piece?$injection_piece?->piece->piece:"" }} <span class="p-2 shadow-sm rounded-pill fw-bolder bg-label-light text-dark">x{{ $injection_piece?$injection_piece?->quantite:"" }}</span> </small>
                </div>

                <div class="p-1 text-center d-flex w-100 justify-content-between bg-label-danger">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Prix dans le stock
                    </h6>
                    <small class="mb-1 w-30 fw-bold">{{ $injection_piece?$injection_piece?->stock_price:"" }} F</small>
                </div>

                <div class="p-1 text-center d-flex w-100 justify-content-between bg-label-danger">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Fournisseur
                    </h6>
                    <small class="mb-1 w-30 fw-bold">{{ $injection_piece?$injection_piece?->stock_price:"" }} F</small>
                </div>

                <div class="p-1 text-center d-flex w-100 justify-content-between bg-label-danger">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Prix du fournisseur
                    </h6>
                    <small class="mb-1 w-30 fw-bold">{{ $injection_piece?$injection_piece?->stock_price:"" }} F</small>
                </div>
            </div>
        </div>
    </div>
</div>


@props(['injection_piece' => '', 'status_color', 'action' => "admin"])



<div class="p-3 m-0 mb-3 border rounded shadow-sm">
    <div class="p-3 mb-3 text-center bg-purple-600 text-uppercase fw-bold w-100 badge">
        <div class="flex justify-between">
            <span>INJECTION DE PIECE DE RECHANGE</span>
            @if ($action == 'admin')
                
           <div class="flex justify-center gap-1">
            <button type="submit" class="p-1 text-white bg-yellow-500 rounded-full hover:bg-yellow-600" title="editer">
                <i class="ti ti-edit ti-xs"></i>
            </button>
            <button type="submit" class="p-1 text-white bg-red-500 rounded-full hover:bg-red-600" title="supprimer">
                <i class="ti ti-trash ti-xs"></i>
            </button>
           </div>
            @endif
        </div>
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

                @if(!empty($injection_piece?->fournisseur_name))
                    <div class="p-1 text-center text-black d-flex w-100 justify-content-between bg-label-light">
                        <h6 class="mb-1 text-primary fw-bold">
                            <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                            Fournisseur
                        </h6>
                        <small class="mb-1 uppercase w-30 fw-bold">{{ $injection_piece?$injection_piece?->fournisseur_name:"" }}</small>
                    </div>
                @endif

                @if(!empty($injection_piece?->fournisseur_name) && !empty($injection_piece?->stock_price))
                <div class="p-1 text-center d-flex w-100 justify-content-between bg-label-danger">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: {{ $status_color }};"></i>
                        Prix du fournisseur
                    </h6>
                    <small class="mb-1 w-30 fw-bold">{{ $injection_piece?$injection_piece?->stock_price:"" }} F</small>
                </div>
                @endif
                
                <div class="px-1 pt-2 text-center bg-white rounded shadow-xl d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-gray-700 fw-bold">
                        TOTAL
                    </h6>
                    <p class="mb-1 text-xl fw-bold">{{ number_format($injection_piece->totalAmount(),0,'',' ') }} F</p>
                </div>
            </div>
        </div>
    </div>
</div>


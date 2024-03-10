@props(['demande'])

<x-slot name="custum_styles">

    @vite(['resources/css/file_viewer.css'])
</x-slot>

<script src="/storage/js/file_viewer.js">
    
</script>

@if (!isset($demande))
    @php
        throw new InvalidArgumentException('Le composant (demande) nécessite une prop "demande"');
    @endphp
@endif

<!-- La modale -->
<div id="myShowDemandeModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>


<div class="p-3 m-0 mb-3 border rounded shadow-sm">
    <div class="p-3 mb-3 text-center text-uppercase fw-bold w-100 badge bg-primary bg-label-primary">
        Demande d'Intervention @php
        echo $demande->statutIcon('xl');
    @endphp
    </div>

    {{-- Demande d'intervention (D.I) --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        @php
                            echo $demande->statutIcon('xl');
                        @endphp
                        D.I
                    </h6>
                </div>
                <small class="mb-1 w-30">{{ $demande->di_reference }}</small>
            </div>
        </div>
    </div>
    {{-- Demande d'intervention (D.I) --}}

    {{-- Demandeur --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                        Demandeur
                    </h6>
                </div>
                <small class="mb-1 w-50">{{ $demande->demandeur->first_name }} {{ $demande->demandeur->last_name }}</small>
            </div>
        </div>
    </div>
    {{-- Demandeur --}}

    {{-- site --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm text-warning"></i>
                        Site
                    </h6>
                </div>
                <small class="mb-1 w-30">{{ $demande->site->name }}</small>
            </div>
        </div>
    </div>
    {{-- site --}}

    {{-- Date & Heure de déclaration --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                        Date et heure de déclaration
                    </h6>
                </div>
                <small class="mb-1 w-30">{{ $demande->created_at->formatLocalized('%e %B %Y à %Hh %M') }}</small>
            </div>
        </div>
    </div>
    {{-- Date & Heure de déclaration --}}

    {{-- Document --}}
    <div class="col-12">
        <div class="shadow-xs border-top border-top-3 list-group">
            <div class="border-0 list-group-item list-group-item-action d-flex align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 text-primary fw-bold">
                        <i class="fa-solid fa-ellipsis ti-sm" style="color: #FFD43B;"></i>
                        Document
                    </h6>
                </div>
                <img src="{{ $demande->document() }}" alt="document" class="mb-1 rounded w-50" id="doc_image_url_in_show_demande" onclick="displayImageInModal('doc_image_url_in_show_demande', 'myShowDemandeModal')" width="100">
            </div>
        </div>
    </div>
    {{-- Document --}}
</div>

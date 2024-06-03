@props(['demande'])

@php
    $btn_bt_disabled = "";
    $btn_injection_piece_disabled = "";
    $btn_cloture_disabled = "";

    if(
        !$demande->bon_travails->last() ||
        ($demande->bon_travails->last())->status == 'annulé' ||
        ($demande->bon_travails->last())->status == 'rejeté'
    ){
        $btn_bt_disabled = "";
    }else{
        $btn_bt_disabled = "disabled";
    }

    if(
        $demande->bon_travails->last() &&
        ($demande->bon_travails->last())->rapportsIntervention &&
        ($demande->bon_travails->last())->status != 'annulé' &&
        ($demande->bon_travails->last())->status != 'rejeté' &&
        ($demande->bon_travails->last())->status != 'terminé'
    ){
        $btn_injection_piece_disabled = "";
        $btn_cloture_disabled = "";
    }else{
        $btn_injection_piece_disabled = "disabled";
        $btn_cloture_disabled = "disabled";
    }

@endphp


<div class="btn-group">
    <button class="w-auto p-3 btn btn-icon btn-primary" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        {{-- Actions --}}
        {{-- <span class="ti ti-star"></span> --}}
        <i class="fa-sharp fa-solid fa-gear fa-2xl"></i>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
        <li>
            <a class="dropdown-item {{ $btn_bt_disabled }}" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#create-bt-offcanvas" align="right">
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span>NOUVEAU BON DE TRAVAIL</span>
            </a>
        </li>

        <li>
            <a class="dropdown-item {{ $btn_injection_piece_disabled }}" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#injection-piece-offcanvas" align="right">
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span>INJECTION DE PIECE</span>
            </a>
        </li>

        <li>
            <a class="dropdown-item {{ $btn_cloture_disabled }}" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#cloture-rapport-offcanvas" align="right">
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span>CLOTURER LA REQUETE</span>
            </a>
        </li>

        <li><a class="dropdown-item" href="javascript:void(0)"></a></li>
    </ul>
</div>

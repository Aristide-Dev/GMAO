@props(['demande'])

@php
    $btn_cloture_disabled = "disabled";
    $btn_bt_disabled = "disabled";
    $btn_injection_piece_disabled = "disabled";

    if(
        !$demande->bon_travails->last()
    ){
        $btn_bt_disabled = "";
    }else{
        $btn_bt_disabled = "disabled";
    }

    if($demande->bon_travails->last() && ($demande->bon_travails->last())->rapportsIntervention){
        if(($demande->bon_travails->last())->status == 'injection de pièce')
        {
            $btn_injection_piece_disabled = "";
            $btn_bt_disabled = "disabled";
            $btn_cloture_disabled = "disabled";
        }

        if(
        ($demande->bon_travails->last())->status != 'annulé' ||
        ($demande->bon_travails->last())->status != 'rejeté' ||
        ($demande->bon_travails->last())->status != 'terminé')
        {
            $btn_cloture_disabled = "";
        }
    }
    // $btn_bt_disabled = "";
    // $btn_injection_piece_disabled = "";
    // $btn_cloture_disabled = "";

@endphp


<div class="btn-group">
    <button class="flex justify-between w-auto gap-2 p-3 text-white bg-blue-500 shadow-xl rounded-xl btn hover:bg-blue-600" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        {{-- Actions --}}
        parametres
        <i class="shadow-xl fa-sharp fa-solid fa-gear fa-2xl shadow-blue-200"></i>
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

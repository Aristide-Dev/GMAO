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
        ($demande->bon_travails->last())->status != 'Clôturé')
        {
            $btn_cloture_disabled = "";
        }
    }
    // $btn_bt_disabled = "";
    // $btn_injection_piece_disabled = "";
    // $btn_cloture_disabled = "";

@endphp



<div class="dropdown">
    <button class="p-0 btn" type="button" id="demandeActionsPanel" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="ti ti-dots-vertical ti-sm text-muted"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="demandeActionsPanel">
        <a class="text-white bg-blue-400 dropdown-item hover:bg-blue-600  {{ $btn_bt_disabled }}" href="javascript:void(0)"
            data-bs-toggle="offcanvas" data-bs-target="#create-bt-offcanvas" align="right">
            <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
            <span>NOUVEAU BON DE TRAVAIL</span>
        </a>

        <a class="text-white bg-violet-400 dropdown-item hover:bg-violet-600" href="javascript:void(0)"
            data-bs-toggle="offcanvas" data-bs-target="#injection-piece-offcanvas" align="right">
            <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
            <span>INJECTION DE PIECE</span>
        </a>

        <a class="text-white bg-green-400 dropdown-item hover:bg-green-600" href="javascript:void(0)"
            data-bs-toggle="offcanvas" data-bs-target="#cloture-rapport-offcanvas" align="right">
            <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
            <span>CLOTURER LA REQUETE</span>
        </a>

        <hr class="mx-2 mt-2 mb-4 border-gray-300 border-1 rounded-xl">

        <a class="text-white bg-yellow-400 dropdown-item hover:bg-yellow-600"
            href="{{route('admin.demandes.edit',$demande)}}">
            <i class="ti ti-edit me-0 me-sm-1 ti-xs"></i>
            <span>EDITER</span>

        </a>
        <form action="{{route('admin.demandes.destroy',$demande)}}" method="post"
            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ? cette action est irréversible!');">
            @csrf
            @method('delete')
            <button type="submit" class="text-white bg-red-400 dropdown-item hover:bg-red-600">
                <i class="ti ti-trash me-0 me-sm-1 ti-xs"></i>
                <span>SUPPRIMER</span>
            </button>
        </form>
    </div>
</div>

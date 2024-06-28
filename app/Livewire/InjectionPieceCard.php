<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\InjectionPiece;

class InjectionPieceCard extends Component
{
    public $action = "public";
    public $injectionPiece;
    public bool $isEditModalOpen = false;
    public bool $isDeleteModalOpen = false;
    public $pieces;

    public $piece_id;
    public $ri_reference;
    public $take_in_stock;
    public $quantite;
    public $stock_price;
    public $take_in_fournisseur;
    public $fournisseur_name;
    public $fournisseur_price;

    protected $rules = [
        'piece_id' => 'required',
        'quantite' => 'required|integer|min:1',
        'pris_dans_le_stock' => 'boolean',
        'nom_du_fournisseur' => 'nullable|string|max:255',
        'prix_du_fournissseur' => 'nullable|numeric|min:0',
        'injection_file_file' => 'nullable|image|max:1024', // 1MB Max
    ];

    protected $listeners = ['closeModals'];

    public function mount($pieces, $injectionPiece, $action = "public")
    {
        $this->pieces = $pieces;
        $this->injectionPiece = $injectionPiece;
        $this->action = $action;

        $this->piece_id = $injectionPiece->piece_id;
        $this->ri_reference = $injectionPiece->ri_reference;
        $this->take_in_stock = $injectionPiece->take_in_stock;
        $this->quantite = $injectionPiece->quantite;
        $this->stock_price = $injectionPiece->stock_price;
        $this->take_in_fournisseur = $injectionPiece->take_in_fournisseur;
        $this->fournisseur_name = $injectionPiece->fournisseur_name;
        $this->fournisseur_price = $injectionPiece->fournisseur_price;
    }

    public function render()
    {
        $status_color = 'green'; // Vous pouvez définir votre logique pour la couleur du statut ici

        return view('livewire.injection-piece-card', [
            'status_color' => $status_color,
        ]);
    }

    public function openEditModal()
    {
        $this->isEditModalOpen = true;
    }

    public function openDeleteModal()
    {
        $this->isDeleteModalOpen = true;
    }

    public function closeModals()
    {
        $this->isEditModalOpen = false;
        $this->isDeleteModalOpen = false;
    }

    public function updateInjectionPiece()
    {
        $this->validate([
            'injectionPiece.piece_id' => 'required',
            'injectionPiece.quantite' => 'required|numeric',
            'injectionPiece.stock_price' => 'required|numeric',
            // Ajoutez d'autres validations selon vos besoins
        ]);

        $this->injectionPiece->save();
        $this->dispatch('injectionPieceUpdated'); // Émettre un événement pour indiquer la mise à jour
        $this->closeModals();
    }

    public function deleteInjectionPiece()
    {
        $this->injectionPiece->delete();
        $this->dispatch('injectionPieceDeleted'); // Émettre un événement pour indiquer la suppression
        $this->closeModals();
    }
}

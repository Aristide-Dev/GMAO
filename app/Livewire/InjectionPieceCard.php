<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\InjectionPiece;

class InjectionPieceCard extends Component
{
    public InjectionPiece $injectionPiece;
    public bool $isEditModalOpen = false;
    public bool $isDeleteModalOpen = false;
    public $pieces;

    protected $listeners = ['closeModals'];

    public function mount($pieces)
    {
        $this->pieces = $pieces;
    }

    public function render()
    {
        $status_color = 'green'; // Vous pouvez définir votre logique pour la couleur du statut ici

        return view('livewire.injection-piece-card', [
            'injection_piece' => $this->injectionPiece,
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
        $this->injectionPiece->update();
        $this->dispatch('injectionPieceUpdated'); // Émettre un événement pour indiquer la suppression
        $this->closeModals();
    }

    public function deleteInjectionPiece()
    {
        
        $this->injectionPiece->delete();
        $this->dispatch('injectionPieceDeleted'); // Émettre un événement pour indiquer la suppression
        $this->closeModals();
    }
}

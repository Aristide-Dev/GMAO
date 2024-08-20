<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Formation;

class Formations extends Component
{
    use WithFileUploads;

    public $formations = [];
    public $title;
    public $description;
    public $pdf_file;

    public function mount()
    {
        $this->getFormations();
    }

    private function getFormations()
    {
        $this->formations = Formation::all();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'pdf_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $formation = new Formation();
        $formation->title = $this->title;
        $formation->description = $this->description;

        if ($this->pdf_file) {
            $path = $this->pdf_file->store('formations', 'public');
            $formation->pdf_path = $path;
        }

        $formation->save();

        session()->flash('success', 'Formation ajoutée avec succès!');
        $this->getFormations();

        // Reset input fields after submission
        $this->reset(['title', 'description', 'pdf_file']);
    }

    public function remove($idFormation)
    {
        $formation = Formation::find($idFormation);
        $formation->delete();

        session()->flash('success', 'Formation supprimée avec succès!');
        $this->getFormations();
    }

    public function render()
    {
        return view('livewire.formations');
    }
}

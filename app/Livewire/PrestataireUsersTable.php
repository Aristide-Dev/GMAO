<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PrestataireUsersTable extends Component
{
    use WithPagination;

    public $search = '';
    public $action_name = '';

    protected $queryString = ['search'];


    public function mount($action_name)
    {
        $this->action_name = $action_name;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user();
        $prestataire = $user->prestataire;

        $utilisateurs = User::where('prestataire_own', $prestataire->id)
            ->where(function($query) {
                $query->where('last_name', 'like', '%'.$this->search.'%')
                      ->orWhere('email', 'like', '%'.$this->search.'%')
                      ->orWhere('telephone', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('livewire.prestataire-users-table', ['utilisateurs' => $utilisateurs]);
    }
}

<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        if(Auth::user()->role == 'super_admin')
        {
            $utilisateurs = User::where("role", '<>', 'agent')
            ->where(function($query) {
                $query->where('first_name', 'like', '%'.$this->search.'%')
                        ->orwhere('last_name', 'like', '%'.$this->search.'%')
                        ->orwhere('email', 'like', '%'.$this->search.'%')
                        ->orwhere('telephone', 'like', '%'.$this->search.'%');
            })
            ->orderby('created_at', 'desc')
            ->paginate(8);
        }else{
            $utilisateurs = User::where("role", '<>', 'agent')
            ->where("role", '<>', 'super_admin')
            ->where(function($query) {
                $query->where('first_name', 'like', '%'.$this->search.'%')
                        ->orwhere('last_name', 'like', '%'.$this->search.'%')
                        ->orwhere('email', 'like', '%'.$this->search.'%')
                        ->orwhere('telephone', 'like', '%'.$this->search.'%');
            })
            ->orderby('created_at', 'desc')
            ->paginate(8);
        }
        
        return view('livewire.users-table', ['utilisateurs' =>$utilisateurs]);
    }
}

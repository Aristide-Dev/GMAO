<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.users-table', [
            'utilisateurs' => User::where('first_name', 'like', '%'.$this->search.'%')
                                            ->orwhere('last_name', 'like', '%'.$this->search.'%')
                                            ->orwhere('email', 'like', '%'.$this->search.'%')
                                            ->orwhere('telephone', 'like', '%'.$this->search.'%')
                                            ->orderby('created_at', 'desc')
                                            ->paginate(20),
        ]);
    }
}

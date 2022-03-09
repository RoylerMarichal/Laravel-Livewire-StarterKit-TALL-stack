<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ClientsLivewire extends Component
{
    public $search;

    public $type = 'name';

    public function render()
    {
        return view('livewire.clients-livewire', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%')->orWhere('id', 'like', '%'.$this->search.'%')->orWhere('phone', 'like', '%'.$this->search.'%')->paginate(50)
        ]);
    }

    public function login($id)
    {
        $user = User::find($id);
        Auth::login($user);
        redirect()->route('home');
    }
}

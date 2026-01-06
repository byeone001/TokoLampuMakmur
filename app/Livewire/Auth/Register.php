<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $name, $username, $gender, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'gender' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'gender' => $this->gender,
            'password' => Hash::make($this->password),
            'role' => 'kasir', // Default role registration
        ]);

        Auth::login($user);

        return redirect()->intended('/pos');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.app', ['title' => 'Register Kasir']);
    }
}

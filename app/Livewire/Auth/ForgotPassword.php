<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $username;
    public $password;
    public $password_confirmation;

    public function resetPassword()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('username', $this->username)
            ->orWhere('email', $this->username)
            ->first();

        if (!$user) {
            $this->addError('username', 'Username atau email tidak ditemukan.');
            return;
        }

        $user->update([
            'password' => Hash::make($this->password),
        ]);

        session()->flash('status', 'Password berhasil direset. Silakan masuk dengan password baru Anda.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('components.layouts.app', ['title' => 'Reset Password']);
    }
}

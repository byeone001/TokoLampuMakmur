<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserProfile extends Component
{
    public $name, $username, $password, $password_confirmation;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->username = $user->username;
    }

    public function update()
    {
        $user = auth()->user();

        $this->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')->ignore($user->id)],
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'name' => $this->name,
            'username' => $this->username,
        ];

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        $user->update($data);

        session()->flash('message', 'Profil berhasil diperbarui.');
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}

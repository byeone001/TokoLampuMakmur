<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminEmployee extends Component
{
    public $employees, $user_id;
    public $name, $username, $password, $gender;
    public $isEdit = false;

    public function render()
    {
        // Get limits to 'kasir' role and include sales stats
        $this->employees = User::where('role', 'kasir')
            ->withCount('transactions')
            ->withSum('transactions', 'total_price')
            ->get();
            
        return view('livewire.admin-employee');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->username = '';
        $this->password = '';
        $this->gender = 'Laki-laki';
        $this->user_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'gender' => 'required',
        ]);

        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => 'kasir',
            'gender' => $this->gender,
        ]);

        session()->flash('message', 'Karyawan berhasil ditambahkan.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->gender = $user->gender;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $this->user_id,
            'gender' => 'required',
        ]);

        $user = User::findOrFail($this->user_id);
        $data = [
            'name' => $this->name,
            'username' => $this->username,
            'gender' => $this->gender,
        ];

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        $user->update($data);

        session()->flash('message', 'Data karyawan berhasil diperbarui.');
        $this->resetFields();
    }

    public function delete($id)
    {
        User::destroy($id);
        session()->flash('message', 'Karyawan berhasil dihapus.');
    }

    public function cancel()
    {
        $this->resetFields();
    }
}

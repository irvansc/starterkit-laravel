<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;
use App\Models\User;

class PersonalDetail extends Component
{
    public $name, $username, $email, $phone, $address, $image, $jenis_kelamin;



    public function mount()
    {
        $user = User::find(auth()->user()->id);
        $this->name = $user->name;
        $this->username = $user->username;
        $this->jenis_kelamin = $user->jenis_kelamin;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->image = $user->image;
    }

    public function updatePersonalDetail()
    {
        $this->validate([
            'name' => 'required|string',
            'username' => 'required|unique:users,username,' . auth('web')->id(),
            'email' => 'required|email|unique:users,email,' . auth('web')->id(),
            'phone' => ['nullable', 'regex:/^(8)[1-9][0-9]{7,11}$/'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'username.required' => 'Username wajib diisi',
            'email.required' => 'Email wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Email tidak valid',
            'phone.regex' => 'Nomor HP harus dimulai dengan angka 8 tanpa 0 atau +62. Contoh: 857xxxxxxx',
        ]);

        $user = User::find(auth()->id());

        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;

        // Optional fields
        if (!empty($this->phone)) {
            // Bersihkan awalan 0 / +62 / 62
            $cleanPhone = preg_replace('/^(\+62|62|0)/', '', $this->phone);
            $user->phone = $cleanPhone;
        }

        if (!empty($this->address)) {
            $user->address = $this->address;
        }

        if (!empty($this->jenis_kelamin)) {
            $user->jenis_kelamin = $this->jenis_kelamin;
        }

        if (!empty($this->image)) {
            $user->image = $this->image;
        }

        $user->save();

        $this->emit('updateUserProfile');
        $this->emit('updateTopHeader');
        $this->emit('updateUserProfileSide');

        $this->showToastr('Personal detail berhasil diperbarui', 'success');
    }


    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message,
        ]);
    }
    public function render()
    {
        return view('livewire.back.personal-detail');
    }
}

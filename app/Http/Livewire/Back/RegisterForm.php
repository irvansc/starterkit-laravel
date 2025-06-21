<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Setting;
use Nette\Utils\Random;


class RegisterForm extends Component
{
    public $name, $username, $email, $phone, $password, $confirm_password, $jenis_kelamin, $address;

    public function RegisterHandler()
    {
        $this->validate(
            [
                'name' => 'required',
                'username' => 'required|unique:users,username|min:6|max:20',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
                'jenis_kelamin' => 'required',
                'address' => 'required',

            ],
            [
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi',
                'username.required' => 'Username wajib diisi',
                'username.unique' => 'Username sudah ada.',
                'username.min' => 'Username minimal 6 karakter',
                'username.max' => 'Username minimal 20 karakter',
                'email.email' => 'Masukan email valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'phone.required' => 'Whatsapp wajib diisi',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 6 karakter',
                'confirm_password.required' => 'Konfirmasi password wajib diisi',
                'confirm_password.same' => 'Konfirmasi password tidak sama dengan password',
                'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
                'address.required' => 'Alamat wajib diisi',
            ]
        );

        if ($this->isOnline()) {
            DB::beginTransaction();
            try {
                $user = new User();
                $user->name = $this->name;
                $user->email = $this->email;
                $user->password = Hash::make($this->password);
                $user->username = Str::slug($this->username);
                $user->phone = $this->phone;
                $user->remember_token = Str::random(10);
                $user->jenis_kelamin = $this->jenis_kelamin;
                $user->address = $this->address;
                $user->save();
                $user->assignRole('user');

                $user->sendEmailVerificationNotification();

                DB::commit();

                session()->flash('success', 'Registrasi berhasil! Silakan cek email Anda untuk verifikasi akun.');
                $this->resetInputFields();
                $this->dispatchBrowserEvent('hide_add_user_modal');
            } catch (\Exception $e) {
                DB::rollback();
                session()->flash('error', 'An error occurred: ' . $e->getMessage());
            }
        } else {
            session()->flash('error', 'You are offline, check your connection and submit form again later');
        }
    }
    public function isOnline($site = 'https://www.youtube.com/')
    {
        if (@fopen($site, 'r')) {
            return true;
        } else {
            return false;
        }
    }
    public function render()
    {
        return view('livewire.back.register-form');
    }
}

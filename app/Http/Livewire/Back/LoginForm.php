<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $login_id;

    public $password;

    public $returnUrl;

    public function mount()
    {
        $this->returnUrl = request()->returnUrl;
    }

    public function LoginHandler()
    {
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $rules = [
            'login_id' => 'required|exists:users,' . $fieldType,
            'password' => 'required|min:5',
        ];
        $messages = [
            'login_id.required' => 'Email or Username is required',
            'login_id.exists' => 'This ' . $fieldType . ' is not registered',
            'password.required' => 'Enter your password',
        ];

        if ($fieldType == 'email') {
            $rules['login_id'] .= '|email';
            $messages['login_id.email'] = 'Invalid email address';
        }

        $this->validate($rules, $messages);

        $creds = [$fieldType => $this->login_id, 'password' => $this->password];

        if (Auth::guard('web')->attempt($creds)) {
            $checkUser = User::where($fieldType, $this->login_id)->first();

            // Cek verifikasi email
            if ($checkUser->email_verified_at === null) {
                Auth::guard('web')->logout();
                $checkUser->sendEmailVerificationNotification(); // Kirim ulang email verifikasi
                session()->flash('fail', 'Email belum diverifikasi. Link verifikasi baru telah dikirim ke email Anda.');
                return redirect()->route('auth.login');
            }

            if ($this->returnUrl != null) {
                return redirect()->to($this->returnUrl);
            } else {
                return redirect()->route('home');
            }
        } else {
            session()->flash('fail', 'Incorrect Email/Username or Password');
        }
    }

    public function render()
    {
        return view('livewire.back.login-form');
    }
}

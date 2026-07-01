<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $showPassword = false;
    public $errorMessage = ''; // Tambahkan ini
    
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    protected $messages = [
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal 8 karakter',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->errorMessage = ''; // Reset error saat user mengetik
    }

    public function login()
    {
        // Reset error message
        $this->errorMessage = '';
        
        // Validasi
        $this->validate();

        // Rate limiting
        $key = Str::lower($this->email) . '|' . request()->ip();
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->errorMessage = 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . $seconds . ' detik.';
            return;
        }

        // Attempt login
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::clear($key);
            session()->regenerate();
            
            // Redirect ke dashboard
            return redirect()->intended(route('dashboard'));
        }

        RateLimiter::hit($key);
        
        // Set error message
        $this->errorMessage = 'Email atau password yang Anda masukkan salah.';
        
        // Reset password field
        $this->password = '';
    }

    public function toggleShowPassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.guest');
    }
}
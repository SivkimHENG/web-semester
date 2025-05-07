<?php

namespace App\Livewire;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserRegistration extends Component
{
    public $name;

    public $password;

    public $password_confirmation;
    public $email;

    protected $rules = [
        'name' => 'required|string|min:6',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:8|confirmed',
    ];

    public function registrationStore()
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($validated['password']);
        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => $validated['password'],
            'roles'    => 'user',
        ]);
        session()->flash('message', 'User Created');
        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.user-registration')->layout('components.layouts.app');
    }
}




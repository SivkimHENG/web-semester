<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserRegistration extends Component
{
    public $username;

    public $password;

    public $email;

    public $confirmation_password;

    public $user;

    public function registrationStore(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255|min:6',
            'email' => 'required|max:255|min:10',
            'password' => 'required',
        ]);

        $this->password = Hash::make($this->password);
        User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        session()->flash('message', 'User Created');

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return <<<'HTML'
            <div>
                <form wire:submit.prevent="update">
                    <label>Username</label>
                    <input type="text" wire:model="username" placeholder="Entering Username..." />
                    @error('username')
                        <span class="text-red-500" role="alert">{{ $message }}</span>
                    @enderror
                    <label>Email</label>
                    <input type="email" wire:model="email" placeholder="Entering Email..." />
                    @error('email')
                        <span class="text-red-500" role="alert">{{ $message }}</span>
                    @enderror
                    <label>Password</label>
                    <input type="password" wire:mode="password"  placeholder="Entering Password..." />
                    @error('password')
                        <span class="text-red-500" role="alert">{{ $message }}</span>
                    @enderror
                    <label>Confirmation Password</label>
                    <input type="password" wire:mode="passwordConfirmation" placeholder="Entering Confirmation..." />
                    @error('passwordConfirmation')
                        <span class="text-red-500" role="alert">{{ $message }}</span>
                    @enderror
                    <button wire:click="$emit('registrationStore')">Create</button>
                </form>
        </div>
        HTML;
    }
}

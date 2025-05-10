<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileDropdown extends Component
{
    public $creditScore;
    public $user;
    public $initials;

    public function mount()
    {
        $this->user = Auth::user();
        $this->creditScore = $this->user->credit_score;

        $nameParts = preg_split('/\s+/', trim($this->user->name));
        $initialsArr = [];
        foreach (array_slice($nameParts, 0, 2) as $part) {
            $initialsArr[] = strtoupper(substr($part, 0, 1));
        }
        $this->initials = implode('', $initialsArr);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.components.profile-dropdown');
    }
}

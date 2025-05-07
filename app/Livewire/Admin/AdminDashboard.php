<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class AdminDashboard extends Component
{





    public function render()
    {
        return view('livewire.admin.admin-dashboard')->layout('components.layouts.admin');
    }
}

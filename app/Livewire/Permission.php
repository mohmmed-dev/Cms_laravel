<?php

namespace App\Livewire;

use Livewire\Component;

class Permission extends Component
{
    public $permissions;
    public $title ;
    public $num = 1;

    public function render()
    {
        return view('livewire.permission');
    }
}

<?php

namespace App\Livewire;

use App\Models\Alert;
use Livewire\Component;

class NotificationNum extends Component
{
    public $number = 0;
    public $alert;
     public function mount() {
        $this->alert = Alert::where('user_id', auth()->user()->id)->first();
        $this->number = $this->alert->alert;
    }
    public function removeAlert() {
        $this->alert->alert = 0;
        $this->alert->save();
        $this->number = $this->alert->alert;
    }
    public function render()
    {
        return view('livewire.notification-num');
    }
}

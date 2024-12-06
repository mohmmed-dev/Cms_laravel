<?php

namespace App\Livewire;

use App\Models\Alert;
use App\Models\Notification;
use Livewire\Component;

class BellAlert extends Component
{
    public $check = false;
    public $notifications = [];
    public $num;

    public function showDiv() {
        if(!$this->check) {
            $this->notifications();
            $this->check = true;
            return ;
        }
        $this->check = false;
    }



    public function zero() {
        $alert = Alert::where('user_id', auth()->user()->id)->first();
        $alert->alert = 0;
        $alert->save();
    }

    public function notifications() {
        $this->notifications = Notification::where([
            ['user_id','!=', auth()->user()->id],
            ['post_userId','=', auth()->user()->id]
        ])->orderBy('created_at','desc')->limit(4)->get();
    }

    public function render()
    {
        $this->notifications();
        return view('livewire.bell-alert');
    }
}

<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Component;

class PagesBox extends Component
{
    public $check = false;

    public function show() {
        if(!$this->check) {
            $this->check = true;
            return ;
        }
        $this->check = false;
        return ;
    }



    public function render()
    {
        $pages = Page::all();
        return view('livewire.pages-box',compact('pages'));
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Orientation extends Component
{
    public function render()
    {
        $user = auth()->user(); 
        return view('livewire.orientation',compact('user'));
    }
}

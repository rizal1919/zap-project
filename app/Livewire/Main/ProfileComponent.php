<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\User;
use App\Models\Place;

class ProfileComponent extends Component
{
    public $user;
    public $places = [];
    public function render()
    {
        if(!Auth::check()){
            abort(403);
        }

        $this->places = Place::all();
        $this->user = Auth::user();
        return view('livewire.main.profile-component', $this->user)->layout('layouts.template');
    }
}

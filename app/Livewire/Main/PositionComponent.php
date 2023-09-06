<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\User;
use App\Models\Place;

class PositionComponent extends Component
{

    public function render()
    {
        if(!Auth::check()){
            abort(403);
        }
        // $user     = Auth::user();
        $last_activity  = Activity::with('user_activity:id,username', 'place_activity:id,place')->where('user_id', $user->id)->latest()->first();

        $data = [
            // 'user'          => $user,
            'last_activity' => $last_activity
        ];
        return view('livewire.main.position-component', $data)->layout('layouts.template');
    }
}

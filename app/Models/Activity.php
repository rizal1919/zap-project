<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Place;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user_activity()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function place_activity()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }
}

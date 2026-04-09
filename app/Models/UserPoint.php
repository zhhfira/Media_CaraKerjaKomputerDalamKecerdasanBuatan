<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model {
    protected $fillable = ['user_id', 'total_xp', 'level'];
    public function user() { return $this->belongsTo(User::class); }
}
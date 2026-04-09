<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model {
    protected $fillable = ['name', 'image', 'quiz_id', 'min_score'];
    public function users() { return $this->belongsToMany(User::class, 'user_badges'); }
}

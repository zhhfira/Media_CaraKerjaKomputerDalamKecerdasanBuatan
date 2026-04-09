<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = ['title', 'duration_minutes', 'points_per_question', 'kkm'];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)->orderBy('order_no');
    }

    public function attempts(): HasMany
    {
        return $this->hasMany(QuizAttempt::class);
    }
}

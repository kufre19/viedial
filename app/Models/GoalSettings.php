<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GoalSettings extends Model
{
    use HasFactory;

    public function userGoal(): BelongsTo
    {
        return $this->belongsTo(User::class,"user_id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MealBuilt extends Model
{
    use HasFactory;

    protected $table = "meal_built";

    public function MealsBuiltBy(): BelongsTo
    {
        return $this->belongsTo(User::class,"user_id");
    }
}

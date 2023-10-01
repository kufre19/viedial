<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodCategories extends Model
{
    use HasFactory;

    // public function FoodSeason(): BelongsTo
    // {
    //     return $this->belongsTo(FoodSeason::class,"season_id");
    // }
}

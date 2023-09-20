<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodSeason extends Model
{
    use HasFactory;

    // public function FoodCategories(): HasMany
    // {
    //     return $this->hasMany(FoodCategories::class,"season_id");
    // }
}

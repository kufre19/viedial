<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodItems extends Model
{
    use HasFactory;

    public function FoodCategory(): BelongsTo
    {
        return $this->belongsTo(FoodCategories::class,"food_category_id");
    }
}

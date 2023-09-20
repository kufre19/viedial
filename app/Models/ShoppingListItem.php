<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShoppingListItem extends Model
{
    use HasFactory;

    public function ShoppingList(): BelongsTo
    {
        return $this->belongsTo(ShoppingList::class,"shopping_list_id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingList extends Model
{
    use HasFactory;

    public function ShoppingItems(): HasMany
    {
        return $this->hasMany(ShoppingListItem::class,"shopping_list_id");
    }
}

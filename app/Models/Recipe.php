<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'directions',
        'per_servings',
        'image_path',
    ];

    // ingredientsテーブルへの参照
    public function ingredient()
    {
        return $this->hasMany(Ingredient::class);
    }

}

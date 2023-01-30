<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Consts\PaginationConst;
use App\Models\Ingredient;
use App\Models\Recipe;

class ListService
{
    // 検索機能
    public static function searchRecipeItem(Request $request) {

        $search = $request->input('search');

        if (!empty($search)) {
            // 検索フォームにキーワードがある時
            $recipes = Recipe::select('recipes.*')
                ->leftJoin('ingredients', 'recipes.id', '=', 'ingredients.recipe_id')
                ->where('ingredients.ingredient_name', 'LIKE', "%$search%")
                ->orderBy('id')->paginate(PaginationConst::PER_PAGE);
        } else {
            // 無い時は全件表示
            $recipes = Recipe::select('id', 'name', 'created_at', 'updated_at')
            ->orderBy('id')->paginate(PaginationConst::PER_PAGE);
        }
        return $recipes;
    }
}

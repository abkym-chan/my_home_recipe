<?php

namespace App\Http\Controllers;

use App\Consts\PaginationConst;
use Illuminate\Support\Facades\DB;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Services\ListService;
use App\Http\Libraries\SessionManager;

class RecipeController extends Controller
{
    public function list(Request $request) {

        // 戻り先ページをセッションに保存
        SessionManager::putPreviousPage($request);

        // 一覧表示、検索機能
        $recipes = ListService::searchRecipeItem($request);

        return view ('recipe.list', ['recipes' => $recipes]);
    }

    // レシピ詳細ページ
    public function detail(string $id) {
        // idをキーにレシピ情報を取得
        $recipe = Recipe::find($id);
        // recipe_idをレシピidで探して材料情報を取得
        $ingredients = Ingredient::where('recipe_id', $recipe->id)->get();

        return view ('recipe.detail', ['recipe' => $recipe, 'ingredients' => $ingredients]);
    }
}

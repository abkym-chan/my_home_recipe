<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Recipe;
use GuzzleHttp\Promise\Create;

class IngredientService
{
    public static function insertIngredient(Request $request, int $recipeId) {
        $ingredients = array();

        // 材料名が入力されている場合は材料テーブルに保存する
        if ($request->has('ingredient_name')&& is_array($request->ingredient_name)) {

            for ($i = 0; $i < count($request->ingredient_name); $i++) {
                // 材料名が空欄の場合は、材料テーブルにinsertしない
                if (empty($request->ingredient_name[$i])) {
                    continue;
                }
                $ingredient_name = $request->ingredient_name[$i];
                // 分量が空欄の場合はnullを設定する
                $quantity = isset($request->quantity[$i]) ? $request->quantity[$i] : null;

                // insert用の配列に画面から取得した材料情報（1行分）を設定する
                Ingredient::create(array('recipe_id' => $recipeId, 'ingredient_name' => $ingredient_name, 'quantity' => $quantity));
            }
        }
    }

    public static function updateIngredient(Request $request, int $recipeId) {
        $ingredients = array();

        // 材料名が入力されている場合は材料テーブルに保存する
        if ($request->has('ingredient_name')&& is_array($request->ingredient_name)) {

            for ($i = 0; $i < count($request->ingredient_name); $i++) {
                // 材料名が空欄の場合は、材料テーブルにinsertしない
                if (empty($request->ingredient_name[$i])) {
                    continue;
                }
                $ingredient_name = $request->ingredient_name[$i];
                // 分量が空欄の場合はnullを設定する
                $quantity = isset($request->quantity[$i]) ? $request->quantity[$i] : null;

                // insert用の配列に画面から取得した材料情報（1行分）を設定する
                Ingredient::create(array('recipe_id' => $recipeId, 'ingredient_name' => $ingredient_name, 'quantity' => $quantity));
            }
        }
    }
}

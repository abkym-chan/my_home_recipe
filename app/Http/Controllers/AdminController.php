<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Recipe;
use App\Services\RecipeService;
use App\Services\IngredientService;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Http\Libraries\SessionManager;
use App\Consts\MessageConst;

use Exception;

class AdminController extends Controller
{
    // 入力ページ
    public function input() {
        return view('admin.input');
    }

    // 登録アクションメソッド
    public function store(Request $request) {
        try {
            // トランザクション
            DB::begintransaction();
            // レシピ情報登録

            $recipe = RecipeService::insertRecipe($request);

            if(!$recipe) {
                throw new Exception();
            }

            // 直前に登録したレシピ情報のIDを取得
            $recipeId = $recipe->id;

            // ループの中でcreateで登録する場合 start ---
            IngredientService::insertIngredient($request, $recipeId);

            // コミット
            DB::commit();

        } catch (Exception $e) {

            // ロールバック
            DB::rollBack();

            // 異常終了時のリダイレクト
            return redirect()->route('list')->with(['type' => MessageConst::ERROR_STATUS, 'message' => MessageConst::FLASH_INPUT_ERROR]);

        }
        // 正常終了時のリダイレクト
        return redirect()->route('list')->with(['type' => MessageConst::SUCCESS_STATUS, 'message' => MessageConst::FLASH_INPUT_SUCCESS]);

    }

    // 削除アクションメソッド
    public function delete(Request $request) {

        // 戻り先ページ取得
        $page = SessionManager::getPreviousPage($request);

        // トランザクション開始
        try {
            DB::beginTransaction();
            // 材料テーブル削除
            $ingredient = Ingredient::where('recipe_id', $request->id);
            $ingredient->delete();


            // レシピテーブル削除
            $recipe = Recipe::find($request->id);

            // storageのファイルを削除する
            $filename = $recipe->image_path;
            Storage::disk('public')->delete('images/'.$filename);

            $recipe->delete();

            // コミット
            DB::commit();

        }   catch (Exception $e) {

            // ロールバック
            DB::rollback();

            // 異常終了時のリダイレクト
            return redirect()->route('list', ['page' => $page])->with(['type' => MessageConst::ERROR_STATUS, 'message' => MessageConst::FLASH_DELETE_ERROR]);
        }

        // 正常終了時のリダイレクト
        return redirect()->route('list', ['page' => $page])->with(['type' => MessageConst::SUCCESS_STATUS, 'message' => MessageConst::FLASH_DELETE_SUCCESS]);
    }

    // 編集ページ
    public function edit(string $id, Request $request) {
        // レシピ一覧画面の戻り先ページ取得
        $page = SessionManager::getPreviousPage($request);

        // レシピ情報取得
        $recipe = Recipe::find($id);

        $ingredients = Ingredient::where('recipe_id', $recipe->id)->get();


        return view ('admin.edit', ['recipe' => $recipe, 'ingredients' => $ingredients, 'page' => $page]);

    }

    // 更新アクションメソッド
    public function update(Request $request) {
        $page = SessionManager::getPreviousPage($request);

        try {
            // トランザクション開始
            DB::beginTransaction();

            // レシピ情報更新
            $recipe = RecipeService::updateRecipe($request);
            if (!$recipe) {
                throw new Exception();
            }

            // 直前に登録したレシピ情報のIDを取得
            $recipeId = $recipe->id;
            $deleteItem = Ingredient::where('recipe_id', $request->id);
            $deleteItem->delete();

            // ループの中でcreateで登録する
            IngredientService::updateIngredient($request, $recipeId);

            // コミット
            DB::commit();
        } catch (Exception $e) {
            // ロールバック
            DB::rollBack();
            // 異常終了時のリダイレクト
            return redirect()->route('list', ['page' => $page])->with(['type' => MessageConst::ERROR_STATUS, 'message' => MessageConst::FLASH_UPDATE_ERROR]);
        }
        // 正常終了時のリダイレクト
        return redirect()->route('list', ['page' => $page])->with(['type' => MessageConst::SUCCESS_STATUS, 'message' => MessageConst::FLASH_UPDATE_SUCCESS]);
    }
}


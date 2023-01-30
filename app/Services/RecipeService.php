<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

class RecipeService
{
    public static function insertRecipe(Request $request) {

        // 画像の保存先指定
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $filename);
        } else {
            null;
        }

        $recipe = new Recipe();

        // 画像データをリクエストパラメータに追加（同名imageは使用不可のため変更）
        $request->merge(['image_path' => $filename]);

         $result = $recipe->fill($request->except('_token'))->save();

        // 登録処理が成功した場合はrecipeモデルクラス、失敗した場合はfalseを返却する
         return $result ? $recipe : $result;
    }

    public static function updateRecipe(Request $request) {
        // idをキーにレシピ情報を取得する
        $recipe = Recipe::find($request->id);

        // 新しくファイルパスを取得する
        if ($request->has('image')) {

            // storageにあるレシピのファイルパスを削除する
            $deleteFile = $recipe->image_path;
            Storage::disk('public')->delete('public/images/'.$deleteFile);

            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $filename);
        }

        // 画像データをリクエストパラメータに追加（同名imageは使用不可のため変更）
        $request->merge(['image_path' => $filename]);

        $result = $recipe->fill($request->except('_token'))->update();

        // 登録処理が成功した場合はrecipeモデルクラス、失敗した場合はfalseを返却する
        return $result ? $recipe : $result;
    }
}


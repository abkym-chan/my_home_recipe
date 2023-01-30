<?php
namespace App\Http\Libraries;

use Illuminate\Http\Request;

class SessionManager
{
    public static function putPreviousPage(Request $request) {
        // 戻り先ページをセッションに保存
        $request->session()->forget('previous_page');
        if ($request->has('page')) {
            $request->session()->put('previous_page', $request->page);
        }
    }

    public static function getPreviousPage(Request $request) {
        // 戻り先ページ取得
        $page = '1';
        if ($request->session()->has('previous_page')) {
            $page = $request->session()->get('previous_page');
        }
        return $page;
    }
}

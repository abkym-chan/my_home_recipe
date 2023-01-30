<?php

namespace App\Consts;

class MessageConst
{
    const SUCCESS_STATUS = 'success';
    const ERROR_STATUS = 'danger';

    const VALIDATION_ERROR = 'レシピ名は必ず入力してください。';
    const DATA_NOT_EXISTS_ERROR = '対象のデータが存在しません。画面を更新して再度お試しください。';

    const FLASH_INPUT_SUCCESS = 'レシピ情報の登録が完了しました。';
    const FLASH_DELETE_SUCCESS = 'レシピ情報の削除が完了しました。';
    const FLASH_UPDATE_SUCCESS = 'レシピ情報の更新が完了しました。';

    const FLASH_INPUT_ERROR = '登録時にエラーが発生しました。';
    const FLASH_DELETE_ERROR = '削除処理でエラーが発生しました。';
    const FLASH_UPDATE_ERROR = 'レシピ情報の更新に失敗しました。';
}

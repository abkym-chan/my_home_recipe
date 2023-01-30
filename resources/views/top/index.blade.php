@extends('layouts.base')
@section('title'.'我が家レシピ集')
@section('main')
<main continer="main">
    <div class="bg-img">
        <div class="container">
            <div class="row">
                <h1 class="display-4 mb-2">WELCOME!</h1>
                <div class="col-md-8">
                    <p class="concept lead fw-bold">あなたの自慢のレシピを集めてあなた専用の<br class="d-lg-none">レシピノートを作りましょう！</p>
                </div>
                <div class="col-md-3 mx-auto">
                    <a class="btn btn-dark btn-lg text-nowrap  mb-3" href="{{url('/recipe/list') }}" type="button">レシピを見る</a>
                </div>
            </div>
            <!-- 早見表 -->
            <div class="row">
                <h2 class="mb-3">調味料早見表</h2>
                <div class="table-responsive col-md-12">
                    <table class="table text-nowrap table-bordered p-0">
                        <thead>
                            <tr class="table_th table-secondary">
                                <th class="align-middle">調味料</th>
                                <th class="align-top">小さじ１(5ml)</th>
                                <th class="align-top">大さじ１(15ml)</th>
                                <th class="align-middle">1カップ(200ml)</th>
                                <th class="align-middle">調味料</th>
                                <th class="align-top">小さじ１(5ml)</th>
                                <th class="align-top">大さじ１(15ml)</th>
                                <th class="align-middle">1カップ(200ml)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-light">
                                <td class="item">水</td>
                                <td>5g</td>
                                <td>15g</td>
                                <td>200g</td>
                                <td class="item">グラニュー糖</td>
                                <td>4g</td>
                                <td>12g</td>
                                <td>180g</td>
                            </tr>
                            <tr class="table-light">
                                <td class="item">酢</td>
                                <td>5g</td>
                                <td>15g</td>
                                <td>200g</td>
                                <td class="item">小麦粉</td>
                                <td>3g</td>
                                <td>9g</td>
                                <td>130g</td>
                            </tr>
                            <tr class="table-light">
                                <td class="item">酒</td>
                                <td>5g</td>
                                <td>15g</td>
                                <td>200g</td>
                                <td class="item">片栗粉</td>
                                <td>3g</td>
                                <td>9g</td>
                                <td>130g</td>
                            </tr>
                            <tr class="table-light">
                                <td class="item">醤油</td>
                                <td>6g</td>
                                <td>18g</td>
                                <td>230g</td>
                                <td class="item">牛乳</td>
                                <td>5g</td>
                                <td>15g</td>
                                <td>210g</td>
                            </tr>
                            <tr class="table-light">
                                <td class="item">みそ</td>
                                <td>6g</td>
                                <td>18g</td>
                                <td>230g</td>
                                <td class="item">バター</td>
                                <td>4g</td>
                                <td>12g</td>
                                <td>180g</td>
                            </tr>
                            <tr class="table-light">
                                <td class="item">みりん</td>
                                <td>6g</td>
                                <td>18g</td>
                                <td>230g</td>
                                <td class="item">油</td>
                                <td>4g</td>
                                <td>12g</td>
                                <td>180g</td>
                            </tr>
                            <tr class="table-light">
                                <td class="item">塩</td>
                                <td>6g</td>
                                <td>18g</td>
                                <td>230g</td>
                                <td class="item">ゴマ</td>
                                <td>3g</td>
                                <td>9g</td>
                                <td>120g</td>
                            </tr>
                            <tr class="table-light">
                                <td class="item">上白糖</td>
                                <td>3g</td>
                                <td>9g</td>
                                <td>130g</td>
                                <td class="item">はちみつ</td>
                                <td>7g</td>
                                <td>21g</td>
                                <td>280g</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <p>参考文献※農林水産省「計量スプーンや計量カップの容量と重さの関係」</p>
            </div>
        </div>
    </div>
</main>
@endsection

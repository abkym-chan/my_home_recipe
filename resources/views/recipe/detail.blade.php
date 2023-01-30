@extends('layouts.base')
@section('title'.'レシピ詳細')
@section('main')
<main>
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <!-- レシピ画像 -->
                <div class="col-xxl-4 mt-3">
                    <img src="{{ Storage::url('/images/'.$recipe->image_path) }}" alt="recipe_img">
                </div>
                <!-- レシピ詳細 -->
                <div class="col-xxl-8">
                    <h1>レシピ名:{{ $recipe->name }}</h1>
                    <div class="font">{{ $recipe->per_servings }}人分</div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="font col-md-5">材料</th>
                                    <th class="font col-md-3">分量</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ingredients as $ingredient)
                                <tr>
                                    <td>{{ $ingredient->ingredient_name }}</td>
                                    <td>{{ $ingredient->quantity }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <p class="font">作り方</p>
                        <p>
                           {{ $recipe->directions }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

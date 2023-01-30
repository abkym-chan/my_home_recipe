@extends('layouts.base')
@section('title'.'レシピ編集')
@section('main')
<main>
    <div class="bg-light p-sm-5">
        <div class="continer mx-3">
            <div id="input">
                {{ Form::open(['name' => 'edit_form', 'url' => url('/admin/update'), 'class' => 'edit_form', 'enctype' => 'multipart/form-data']) }}
                    <div class="row mb-3">
                        <h1>レシピ編集</h1>
                        <!-- レシピ名 -->
                        {{ Form::label('name', 'レシピ名(必須)', ['class' => 'font col-md-2 col-form-label']) }}
                        <div class="col-md-4">
                            {{ Form::text('name', old('name', $recipe->name), ['class' => 'form form-control-lg required', 'maxlength' => '50']) }}
                            @error('name')
                                 <div class= "text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- 画像 -->
                        {{ Form::label('image', '選択中の画像', ['class' => 'font col-md-1 col-form-label']) }}
                        <div class="col-md-2">
                            @if ($recipe->image_path !=='')
                                <img class="detail_img" src="{{ \Storage::url('/images/'.$recipe->image_path) }}">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <p class="font mt-2">新しく選択する</p>
                            {{ Form::file('image', old('image'), ['class' => 'form form-control m-5']) }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- 人分 -->
                        <div class="col-xxl-1 col-md-1 col-sm-2">
                            {{ Form::text('per_servings', old('per_servings', $recipe->per_servings), ['class' => 'form-control px-1']) }}
                        </div>
                        <div class="col-md-1 col-sm-2">
                            {{ Form::label('per_servings', '人分', ['class' => 'font col-form-label']) }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th class="th_l">材料</th>
                                        <th class="th-s">分量</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @foreach($ingredients as $ingredient)
                                <tbody>
                                    <tr>
                                        <td>{{ Form::text('ingredient_name[]', old('ingredient_name[]', $ingredient->ingredient_name), ['class' => 'form-control pt-2 mb-1']) }}</td>
                                        <td>{{ Form::text('quantity[]', old('quantity[]', $ingredient->quantity), ['class' => 'form-control pt-2 mb-1']) }}</td>
                                        <td>{{ Form::submit('削除', ['class' => 'delete_button btn btn-danger btn-sm', 'name' => 'delete_button', 'onclick' => 'coldelete(this)',]) }}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="p-3 text-center">
                                    <input type="button" onclick= addTableTr() class="btn btn-secondary pb-1" value="+材料を追加">
                                </div>
                            </div>
                        </div>
                        <!-- 作り方 -->
                        <div class="col-md-6">
                            {{ Form::label('directions', '作り方', ['class' => 'font p-0 col-md-2 col-form-label']) }}
                            {{ Form::textarea('directions', old('directions', $recipe->directions), ['class' => 'form-control', 'id' => 'directions', 'cols' => '60', 'rows' => '10']) }}
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="mt-4 d-grid col-3">
                            <a class="btn btn-ml btn-secondary" name='page' href="/recipe/list?page={{ $page }}">戻る</a>
                        </div>
                        <div class="mt-4 d-grid col-3">
                            {{ Form::submit('更新', ['class' => 'btn btn-primary', 'name' => 'edit_button']) }}
                        </div>
                    <input type='hidden' name='id' value='{{ $recipe->id }}'>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="{{ url('/js/pluralForm.js') }}"></script>
@endsection



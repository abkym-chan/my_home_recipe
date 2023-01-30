@extends('layouts.base')
@section('title'.'レシピ登録')
@section('main')
<main>
    <div class="bg-light p-sm-5">
        <div class="continer mx-3">
            <div id="input">
                {{ Form::open(['name' => 'input_form', 'url' => url('/admin/store'), 'class' => 'input_form', 'enctype' => 'multipart/form-data']) }}
                    <div class="row mb-3">
                        <h1>レシピ登録</h1>
                        <!-- レシピ名 -->
                        {{ Form::label('name', 'レシピ名(必須)', ['class' => 'font col-md-2 col-form-label']) }}
                        <div class="col-md-4">
                            {{ Form::text('name', old('name'), ['class' => 'form form-control-lg required', 'maxlength' => '50']) }}
                            {{-- @error('name') --}}
                                {{-- <div class= "text-danger">{{ $message }}</div> --}}
                            {{-- @enderror --}}
                        </div>
                        <!-- 画像 -->
                        {{ Form::label('image', '画像', ['class' => 'font col-md-1 col-form-label']) }}
                        <div class="col-md-5">
                            {{ Form::file('image', old('image'), ['class' => 'form form-control']) }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- 人分 -->
                        <div class="col-xxl-1 col-md-1 col-sm-2">
                            {{ Form::text('per_servings', old('per_servings'), ['class' => 'form-control px-1', 'maxlength' => '10']) }}
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
                                <tbody>
                                    <tr>
                                        <td>{{ Form::text('ingredient_name[]', old('ingredient_name[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '50']) }}</td>
                                        <td>{{ Form::text('quantity[]', old('quantity[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '20']) }}</td>
                                        <td>{{ Form::submit('削除', ['class' => 'delete_button btn btn-danger btn-sm', 'name' => 'delete_button', 'onclick' => 'coldelete(this)',]) }}
                                    </tr>
                                    <tr>
                                        <td>{{ Form::text('ingredient_name[]', old('ingredient_name[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '50']) }}</td>
                                        <td>{{ Form::text('quantity[]', old('quantity[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '20']) }}</td>
                                        <td>{{ Form::submit('削除', ['class' => 'delete_button btn btn-danger btn-sm', 'name' => 'delete_button', 'onclick' => 'coldelete(this)',]) }}
                                    </tr>
                                    <tr>
                                        <td>{{ Form::text('ingredient_name[]', old('ingredient_name[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '50']) }}</td>
                                        <td>{{ Form::text('quantity[]', old('quantity[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '20']) }}</td>
                                        <td>{{ Form::submit('削除', ['class' => 'delete_button btn btn-danger btn-sm', 'name' => 'delete_button', 'onclick' => 'coldelete(this)',]) }}
                                    </tr>
                                    <tr>
                                        <td>{{ Form::text('ingredient_name[]', old('ingredient_name[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '50']) }}</td>
                                        <td>{{ Form::text('quantity[]', old('quantity[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '20']) }}</td>
                                        <td>{{ Form::submit('削除', ['class' => 'delete_button btn btn-danger btn-sm', 'name' => 'delete_button', 'onclick' => 'coldelete(this)',]) }}
                                    </tr>
                                    <tr>
                                        <td>{{ Form::text('ingredient_name[]', old('ingredient_name[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '50']) }}</td>
                                        <td>{{ Form::text('quantity[]', old('quantity[]'), ['class' => 'form-control pt-2 mb-1', 'maxlength' => '20']) }}</td>
                                        <td>{{ Form::submit('削除', ['class' => 'delete_button btn btn-danger btn-sm', 'name' => 'delete_button', 'onclick' => 'coldelete(this)',]) }}
                                    </tr>
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
                            {{ Form::textarea('directions', old('directions'), ['class' => 'form-control', 'id' => 'directions', 'cols' => '60', 'rows' => '10']) }}
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="mt-4 d-grid col-3">
                            <a class="btn btn-ml btn-secondary" name='page' href="/recipe/list">戻る</a>
                        </div>
                        <div class="mt-4 d-grid col-3">
                            {{ Form::submit('登録', ['class' => 'btn btn-primary', 'name' => 'input_button']) }}
                        </div>
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



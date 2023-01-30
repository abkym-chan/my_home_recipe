@extends('layouts.base')
@section('title'.'レシピ一覧')
@section('main')
<main class="background-img">
    <div class="p-3 p-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h1>レシピ一覧</h1>
                </div>
                <div class="col-md-3">
                    <!-- ログイン時のみ表示 auth -->
                    @auth
                    <a class="btn btn-primary text-nowrap mt-4" href="/admin/input">＋レシピを登録する</a>
                    @endauth
                    <!-- ここまでauth -->
                </div>
                <div class="col-md-5 mt-4">
                    {{ Form::open(['name' => 'search', 'method' => 'GET', 'url' => url('/recipe/list')]) }}
                    <div class="input-group">
                        {{ Form::text('search', request('search'), ['class' => 'form-control ', 'placeholder' => '材料で検索', 'maxlength' => '20']) }}
                        {{ Form::submit('検索', ['class' => 'btn btn-success']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="row mt-2">
                <table  class="table table-bordered">
                    <thead class="text-center bg-light">
                        <tr class="table-secondary">
                            <th class="width_1">ID</th>
                            <th class="width_2">レシピ名</th>
                            <th class="text-nowrap">登録日時</th>
                            <th class="text-nowrap">更新日時</th>
                            <!-- ログイン時のみ表示 auth-->
                            @auth
                            <th class="btn-cell width_3"></th>
                            @endauth
                            <!-- ここまでauth -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr class="table-light">
                            <td class="text-center">{{ $recipe->id }}</td>
                            <td class="align-middle"><a href="/recipe/detail/{{ $recipe->id }}">{{ $recipe->name }}</a></td>
                            <td class="align-middle">{{ $recipe->created_at }}</td>
                            <td class="align-middle">{{ $recipe->updated_at }}</td>
                            <!-- ログイン時のみ表示 auth-->
                            @auth
                            <td class="text-center pb-1">
                                {{ Form::open(['name' => 'list_delete', 'url' => url('/admin/delete')]) }}
                                <a class="btn btn-sm btn-primary mb-1" href="/admin/edit/{{ $recipe->id }}">編集</a>
                                    {{ Form::hidden('id', $recipe->id) }}
                                    {{ Form::submit('削除', ['class' => 'btn btn-danger btn-sm mb-1', 'onclick' => 'return recipeDelete()']) }}
                                {{ Form::close() }}
                            </td>
                            @endauth
                            <!-- ここまでauth -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-start">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>

</main>
@endsection

@section('js')
<script src="{{ url('/js/list.js') }}"></script>
@endsection

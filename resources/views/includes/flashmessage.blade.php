@if ($errors->any())
    <div class="container alert alert-danger mt-4">入力に誤りがあります。</div>
@endif

@if (session('type'))
    <div class="continer alert alert-{{ session('type') }} mt-4">{{ session('message') }}</div>
@endif


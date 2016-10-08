@extends('admin.layouts.main')

@section('title', 'Страницы')

@section('content')
<section transition="wrapper" class="wrapper_content">
    <div class="content">
        <h1 class="m-l-3">Страницы</h1>
        @foreach($pages as $page)
            <p>{{ $page->title }}</p>
        @endforeach
    </div>
</section>
@endsection


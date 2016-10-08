@extends('admin.layouts.main')

@section('title', 'Панель управления')

@section('content')
<section v-show="show" transition="wrapper" class="wrapper_content">
    <div class="content">
        <h1>Главная страница панели управления</h1>
    </div>
</section>
@endsection


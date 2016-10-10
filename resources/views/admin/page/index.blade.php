@extends('admin.layouts.main')

@section('title', 'Страницы')

@section('content')
<section class="content">
    <h2>Страницы</h2>
    <table class="table table-hover table-bordered table-striped">
        <colgroup>
            <col width="50">
            <col>
            <col width="250">
            <col>
        </colgroup>
        <thead class="thead-inverse">
        <tr>
            <th>№</th>
            <th>Название</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr>
                <th>{{ $page->id }}</th>
                <td><a href="#">{{ $page->title }}</a></td>
                <td>{{ $page->updated_at }}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $pages->links('pagination::bootstrap-4') }}
</section>
@endsection


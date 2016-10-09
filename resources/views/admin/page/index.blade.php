@extends('admin.layouts.main')

@section('title', 'Страницы')

@section('content')
<section class="content">
    <h1>Страницы</h1>
    <table class="table table-hover table-bordered table-striped">
        <thead class="thead-inverse">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>url</th>
            <th>date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr>
                <th>{{ $page->id }}</th>
                <td>{{ $page->title }}</td>
                <td>{{ $page->url }}</td>
                <td>{{ $page->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection


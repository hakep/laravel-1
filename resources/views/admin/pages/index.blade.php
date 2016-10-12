@extends('admin.layouts.main')

@section('title', 'Страницы')

@section('content')
    <section class="content">
        <div class="panel-page">
            <h4>Список страниц</h4>
            <div class="btn-group" role="group">
                <a href="{{ route('pages.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ДОБАВИТЬ
                    СТРАНИЦУ</a>
            </div>
        </div>
        <table class="table table-sm table-hover table-bordered table-striped">
            <colgroup>
                <col width="50">
                <col>
                <col width="120">
                <col width="200">
            </colgroup>
            <thead class="thead-inverse">
            <tr>
                <th>№</th>
                <th>название</th>
                <th>вкл/выкл</th>
                <th>операции</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td><a href="#">{{ $page->title }}</a></td>
                    <td class="text-xs-center">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox"
                                   class="custom-control-input" {{ $page->published_at ? 'checked' : '' }}>
                            <span class="custom-control-indicator"></span>
                        </label>
                    </td>
                    <td>
                        <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" title="Перейти" data-original-title="Перейти">
                            <i class="fa fa-forward"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Редактировать" data-original-title="Редактировать">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Удалить" data-original-title="Удалить">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $pages->links('pagination::bootstrap-4') }}
    </section>
@endsection


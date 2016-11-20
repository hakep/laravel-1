@extends('admin.main')

@section('title', 'Страницы')

@section('panel-page')
<div class="btn-group panel-page">
    <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i class="fa fa-step-backward"></i></a>
    <a href="{{ route('pages.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
</div>
@endsection

@section('content')
    <section class="content">

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
                <tr id="id-{{ $page->id }}">
                    <td>{{ $page->id }}</td>
                    <td><a href="{{ route('pages.edit', $page->id) }}">{{ $page->title }}</a></td>
                    <td class="text-xs-center">
                        <label class="custom-control custom-checkbox" data-id="{{ $page->id }}" data-status="{{ $page->status }}" @click.prevent="save('{{ route('pages.update', $page->id) }}', $event)">
                            <input type="checkbox" class="custom-control-input" {{ $page->status ? 'checked' : '' }}>
                            <span class="custom-control-indicator"></span>
                        </label>
                    </td>
                    <td class="text-xs-center">
                        <a href="{{ route('url', $page->url) }}" target="_blank" class="btn btn-success btn-xs" data-toggle="tooltip"
                           title="Перейти">
                            <i class="fa fa-forward"></i>
                        </a>
                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary btn-xs"
                           data-toggle="tooltip" title="Редактировать">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button @click.prevent="destroy('{{ route('pages.destroy', $page->id) }}', $event)" class="btn btn-danger"
                                title="Удалить"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $pages->links('pagination::bootstrap-4') }}
    </section>
@endsection


@push('scripts')
<script>

    window.Laravel = {csrfToken: '{{ csrf_token() }}'};

    new Vue({
        el: '.content',
         methods: {
            destroy: function (url) {
                 if (confirm("Вы действительно хотите удалить страницу?")) {
                    this.$http.delete(url).then(function(response) {
                        document.location.reload(true);
                        snackbar(response.json().message);
                    });
                } return false;
            },
            save: function(url, event){
                var formData = {};
                var id = $(event.target).data("id");
                formData.status = $(event.target).data("status");
                formData.statusChange = true; // эта переменная нужна для валидации
                this.$http.patch(url, formData).then(function(response) {
                    $('#id-'+id).find('label').data("status", formData.status ? 0 : 1).find('input').attr("checked", formData.status ? null : "checked");
                    snackbar(response.json().message);
                });
            }
        }
    });
</script>
@endpush
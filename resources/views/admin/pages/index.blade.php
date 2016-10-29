@extends('admin.main')

@section('title', 'Страницы')

@section('content')
    <section class="content">
        @section('panel-page')
            <div class="btn-group panel-page">
                <a href="{{ route('pages.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> ДОБАВИТЬ СТРАНИЦУ</a>
            </div>
        @endsection
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
                    <td><a href="{{ route('pages.edit', $page->id) }}">{{ $page->title }}</a></td>
                    <td class="text-xs-center">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox"
                                   class="custom-control-input" {{ $page->published_at ? 'checked' : '' }}>
                            <span class="custom-control-indicator"></span>
                        </label>
                    </td>
                    <td>
                        <a href="/" target="_blank" class="btn btn-success btn-xs" data-toggle="tooltip" title="Перейти">
                            <i class="fa fa-forward"></i>
                        </a>
                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Редактировать">
                            <i class="fa fa-pencil"></i>
                        </a>

                        {{--<form style="display: inline;" action="{{ route('pages.destroy', $page->id) }}" method="POST">{{ method_field('DELETE') }} {{ csrf_field() }}--}}
                            {{--<button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash"></i></button>--}}
                        {{--</form>--}}
                        <button v-on:click="del({{ $page->id }})" class="btn btn-danger" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash"></i></button>
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
            del: function (xx) {
                console.log(xx);
                {{--alert({{ $page->id }});--}}
                this.$http.delete('{{ route('pages.edit', $page->id) }}').then((response) => {
//                    document.location.reload(true);
                    snackbar(response.json().message);1
            });
            }
        }
    });
</script>
@endpush
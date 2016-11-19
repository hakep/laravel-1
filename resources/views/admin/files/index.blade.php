@extends('admin.main')

@section('title', 'Редактирование файла')

@section('panel-page')
<div class="btn-group panel-page">
    <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i class="fa fa-step-backward"></i></a>
    {{--<a href="#" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>--}}
    {{--<button onclick="save()" class="btn btn-outline-success"><i class="fa fa-check"></i> СОХРАНИТЬ</button>--}}
    {{--<button v-on:click="destroy" class="btn btn-outline-danger"><i class="fa fa-trash"></i> УДАЛИТЬ</button>--}}
</div>
@endsection

@section('content')
<section class="content" id="files">
    <table class="table table-sm table-hover table-bordered table-striped">
        <colgroup>
            <col>
            <col width="150">
        </colgroup>
        <thead class="thead-inverse">
        <tr>
            <th>шаблоны <span class="small text-muted">(./resources/view/site/layouts/)</span></th>
            <th>операции</th>
        </tr>
        </thead>
        <tbody>
        @foreach($templateList as $template)
            <tr>
                <td><a href="{{ route('files', $template) }}">{{ $template }}</a></td>
                <td class="text-xs-center">
                    <a href="{{ route('files', $template) }}" class="btn btn-primary btn-xs"
                       data-toggle="tooltip" title="Редактировать">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <button @click.stop="destroy('{{ route('files', $template) }}')" class="btn btn-danger"
                            title="Удалить"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <table class="table table-sm table-hover table-bordered table-striped">
        <colgroup>
            <col>
            <col width="150">
        </colgroup>
        <thead class="thead-inverse">
        <tr>
            <th>css <span class="small text-muted">(./public/css/)</span></th>
            <th>операции</th>
        </tr>
        </thead>
        <tbody>
        @foreach($templateList as $template)
            <tr>
                <td><a href="{{ route('files', $template) }}">{{ $template }}</a></td>
                <td class="text-xs-center">
                    <a href="{{ route('files', $template) }}" class="btn btn-primary btn-xs"
                       data-toggle="tooltip" title="Редактировать">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <button @click.stop="destroy('{{ route('files', $template) }}')" class="btn btn-danger"
                            title="Удалить"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <table class="table table-sm table-hover table-bordered table-striped">
        <colgroup>
            <col>
            <col width="150">
        </colgroup>
        <thead class="thead-inverse">
        <tr>
            <th>js <span class="small text-muted">(./public/js/)</span></th>
            <th>операции</th>
        </tr>
        </thead>
        <tbody>
        @foreach($templateList as $template)
            <tr>
                <td><a href="{{ route('files', $template) }}">{{ $template }}</a></td>
                <td class="text-xs-center">
                    <a href="{{ route('files', $template) }}" class="btn btn-primary btn-xs"
                       data-toggle="tooltip" title="Редактировать">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <button @click.stop="destroy('{{ route('files', $template) }}')" class="btn btn-danger"
                            title="Удалить"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection

@push('scripts')

@endpush
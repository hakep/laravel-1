@extends('admin.main')

@section('title', 'Редактирование файла')

@section('panel-page')
<div class="btn-group panel-page">
    <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i class="fa fa-step-backward"></i></a>
    <a href="#" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
    {{--<button onclick="save()" class="btn btn-outline-success"><i class="fa fa-check"></i> СОХРАНИТЬ</button>--}}
    {{--<button v-on:click="destroy" class="btn btn-outline-danger"><i class="fa fa-trash"></i> УДАЛИТЬ</button>--}}
</div>
@endsection

@section('content')
<section class="content" id="files">
    <div class="list-group">
        @foreach ($templateList as $template)
            <a href="{{ route('file', $template) }}" class="list-group-item list-group-item-action"><i class="fa fa-file-text-o"></i> <span>{{ $template }}</span></a>
        @endforeach
    </div>
</section>
@endsection

@push('scripts')


@endpush
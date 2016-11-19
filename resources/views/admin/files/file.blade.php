@extends('admin.main')

@section('title', 'Редактирование файла')

@section('panel-page')
<div class="btn-group panel-page">
    <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i class="fa fa-step-backward"></i></a>
    {{--<a href="#" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>--}}
    <button onclick="save()" class="btn btn-outline-success"><i class="fa fa-check"></i> СОХРАНИТЬ</button>
    {{--<button v-on:click="destroy" class="btn btn-outline-danger"><i class="fa fa-trash"></i> УДАЛИТЬ</button>--}}
</div>
@endsection

@section('content')
<section class="content" id="files">
    <textarea title="ace" name="content" style="display: none;"></textarea>
    <div id="editor">{{ $content }}</div>
</section>
@endsection

@push('scripts')

{{--редактор Ace--}}
<script src="{{ asset('panel/js/ace/ace.js') }}"></script>
<script>
    var editor = ace.edit("editor");
    var textarea = $('textarea[name="content"]');
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/html");
    document.getElementById('editor').style.fontSize = '1rem';
    // устанавливаем редактор на всю высоту
    document.getElementById('editor').style.height = window.innerHeight - 52 + 'px';
    editor.getSession().setUseWrapMode(true);
    editor.setHighlightActiveLine(false);
    editor.setShowPrintMargin(false);
    editor.getSession().on("change", function () {
        textarea.val(editor.getSession().getValue());
    });
    editor.$blockScrolling = Infinity;
    editor.setAutoScrollEditorIntoView(true);
    editor.commands.addCommand({
        name: 'myCommand',
        bindKey: {win: 'Ctrl-S', mac: 'Command-S'},
        exec: function () {
            save();
        }, readOnly: true
    });
    function save(){
        $.post("{{ route('files.update', $name) }}",
                {_method: 'PUT', _token: $('meta[name="csrf-token"]').attr('content'), content: editor.getValue()},
                function (data) {
                    snackbar(data.message);
                }
        );
    }
</script>
@endpush
@extends('admin.main')

@section('title', 'Редактировать страницу')

@section('content')
    <section class="content">
        <form action="{{ route('pages.update', $page->id) }}" method="POST" id="edit">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            {{--<div class="panel-page">--}}
                {{--<h4>РЕДАКТИРОВАНИЕ СТРАНИЦЫ</h4>--}}
                {{--<div class="btn-group">--}}
                    {{--<a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i--}}
                                {{--class="fa fa-step-backward"></i></a>--}}
                    {{--<button type="submit" name="save" value="save" class="btn btn-outline-success"><i--}}
                                {{--class="fa fa-check"></i> СОХРАНИТЬ--}}
                    {{--</button>--}}
                    {{--<button type="submit" name="delete" value="delete" class="btn btn-outline-danger"><i--}}
                                {{--class="fa fa-trash"></i> УДАЛИТЬ--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">КОД</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile">РЕДАКТОР</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages">НАСТРОЙКИ</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <textarea name="content" style="display: none;"></textarea>
                    <div id="editor">{{ $page->content }}</div>
                </div>
                <div class="tab-pane fade" id="profile">2</div>
                <div class="tab-pane fade" id="messages">3</div>
            </div>
        </form>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('panel/js/ace/ace.js') }}"></script>
<script src="{{ asset('panel/js/ace/emmet.js') }}"></script>
<script src="{{ asset('panel/js/ace/ext-emmet.js') }}"></script>
<script>
    var editor = ace.edit("editor");
    var textarea = $('textarea[name="content"]');
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/html");
    document.getElementById('editor').style.fontSize = '1rem';
    editor.getSession().setUseWrapMode(true);
    editor.setHighlightActiveLine(false);
    editor.setShowPrintMargin(false);
    editor.getSession().on("change", function () {
        textarea.val(editor.getSession().getValue());
    });
    editor.setAutoScrollEditorIntoView(true);
    editor.setOption("minLines", 20);
    editor.setOption("maxLines", 500);
    editor.commands.addCommand({
        name: 'myCommand',
        bindKey: {win: 'Ctrl-S', mac: 'Command-S'},
        exec: function (editor) {
            $.post("{{ route('pages.update', $page->id) }}",
                    {_method: 'PUT', _token: $('input[name="_token"]').val(), content: editor.getValue()},
                    function () {alert("Страница сохранена!");}
            );
        }, readOnly: true
    });
</script>
@endpush
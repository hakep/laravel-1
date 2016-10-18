@extends('admin.main')

@section('title', 'Редактировать страницу')

@section('content')
    <section class="content">
        <div class="panel-page">
            <h4>Редактировать страницу</h4>
            <div class="btn-group" role="group">
                <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-step-backward"
                                                                           aria-hidden="true"></i></a>
            </div>
        </div>

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Код</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Редактор</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Настройки</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="home" role="tabpanel">
                <div id="editor">{{ $page->content }}</div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel">2</div>
            <div class="tab-pane fade" id="messages" role="tabpanel">3</div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('panel/js/ace/emmet.js') }}"></script>
<script src="{{ asset('panel/js/ace/ace.js') }}"></script>
<script src="{{ asset('panel/js/ace/ext-emmet.js') }}"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/html");
    document.getElementById('editor').style.fontSize='1rem';
    editor.getSession().setUseWrapMode(true);
    editor.setHighlightActiveLine(false);
    editor.setHighlightActiveLine(false);
    editor.setShowPrintMargin(false);
//    editor.setOption("enableEmmet", true);
    editor.commands.addCommand({
        name: 'myCommand',
        bindKey: {win: 'Ctrl-S',  mac: 'Command-S'},
        exec: function(editor) {
            alert(1);
        },
        readOnly: true // false if this command should not apply in readOnly mode
    });

</script>
@endpush
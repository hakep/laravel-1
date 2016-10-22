@extends('admin.main')

@section('title', 'Редактировать страницу')

@section('content')
<section class="content">
    <form action="{{ route('pages.update', $page->id) }}" method="POST" id="edit">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="panel-page">
            <h4>РЕДАКТИРОВАНИЕ СТРАНИЦЫ</h4>
            <div class="btn-group">
                <a href="{{ URL::previous() }}" class="btn btn-outline-secondary"><i class="fa fa-step-backward"></i></a>
                <button type="submit" name="save" value="save" class="btn btn-outline-primary"><i class="fa fa-check"></i> СОХРАНИТЬ</button>
                <button type="submit" name="delete" value="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i> УДАЛИТЬ</button>
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Код</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile">Редактор</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages">Настройки</a>
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
<script src="{{ asset('panel/js/ace/emmet.js') }}"></script>
<script src="{{ asset('panel/js/ace/ace.js') }}"></script>
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
    editor.commands.addCommand({
        name: 'myCommand',
        bindKey: {win: 'Ctrl-S', mac: 'Command-S'},
        exec: function (editor) {
alert(1);


//            $('#edit').ajax({
//                beforeSubmit: function(v,f){
//                    alert("Сохранение пока не работает!");
//                    $.snackbar({content:"Подождите, идет сохранение..."});
//                    $.each(v, function(){
//                        if (this.name == 'content') {
//                            this.value = editor.getValue();
//                            return false;
//                        }
//                    });
//                },
//                success: function(result,v,d,f){
//                    $.snackbar({content:result});
//                }
//            });
        },
        readOnly: true
    });

</script>
@endpush
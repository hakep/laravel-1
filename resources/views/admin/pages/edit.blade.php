@extends('admin.main')

@section('title', 'Редактировать страницу')

@section('content')
    <section class="content">
        <form action="{{ route('pages.update', $page->id) }}" method="POST" id="edit">
            {{ csrf_field() }}
            @section('panel-page')
                <div class="btn-group panel-page">
                    <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i class="fa fa-step-backward"></i></a>
                    <button v-on:click="save" type="submit" name="save" value="save" class="btn btn-outline-success"><i
                                class="fa fa-check"></i> СОХРАНИТЬ
                    </button>
                    <button v-on:click="del" type="submit" name="delete" value="delete" class="btn btn-outline-danger">
                        <i class="fa fa-trash"></i> УДАЛИТЬ
                    </button>
                </div>
            @endsection
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1">КОД</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2">РЕДАКТОР</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3">НАСТРОЙКИ</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <textarea name="content" style="display: none;"></textarea>
                    <div id="editor">{{ $page->content }}</div>
                </div>
                <div class="tab-pane fade" id="tab2">2</div>
                <div class="tab-pane fade" id="tab3">3</div>
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
                    function () {
                        alert("Страница сохранена!");
                    }
            );
        }, readOnly: true
    });
</script>
<script>
    window.Laravel = {csrfToken: '{{ csrf_token() }}'};


    new Vue({
        el: '.panel-page',
        data: {
            message: 'Сохранение'
        },
        methods: {
            save: function () {
                var formData = {};
                formData.content = editor.getSession().getValue();
                this.$http.patch('{{ route('pages.update', $page->id) }}', formData).then((response) => {
                    console.log(response.body);
                });
            },
            del: function () {
                this.$http.delete('{{ route('pages.destroy', $page->id) }}').then((response) => {
                    window.location.href= JSON.parse(response.body).redirect_url;
                });
            }
        }
    });
</script>
@endpush
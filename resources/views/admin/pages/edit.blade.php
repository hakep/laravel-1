@extends('admin.main')

@section('title', 'Редактировать страницу')

@section('content')
    <section class="content">
        <form action="{{ route('pages.update', $page->id) }}" method="POST" id="edit">
            {{ csrf_field() }}
            @section('panel-page')
                <div class="btn-group panel-page">
                    <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i class="fa fa-step-backward"></i></a>
                    <button @click.stop="save" class="btn btn-outline-success"><i class="fa fa-check"></i> СОХРАНИТЬ</button>
                    <button @click.stop="destroy" class="btn btn-outline-danger"><i class="fa fa-trash"></i> УДАЛИТЬ</button>
                </div>
            @endsection
            <ul class="nav nav-tabs">
                <li class="nav-item"><a id="ace" class="nav-link" data-toggle="tab" href="#tab1">КОД</a></li>
                <li class="nav-item"><a id="ckeditor" class="nav-link" data-toggle="tab" href="#tab2">РЕДАКТОР</a></li>
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab3">НАСТРОЙКИ</a></li>
                <li class="nav-item float-lg-right"><a class="nav-link" href="{{ route('url', $page->url) }}" target="_blank">{{ $page->title }}</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade" id="tab1">
                    <textarea name="content" style="display: none;"></textarea>
                    <div id="editor">{{ $page->content }}</div>
                </div>
                <div class="tab-pane fade" id="tab2"><textarea name="editor1" id="editor1" cols="45" rows="5">{{ $page->content }}</textarea></div>
                <div class="tab-pane fade in active" id="tab3">
                    <div class="">
                        <div class="card">
                            <div class="card-block">
                                            <div class="form-group">
                                    <label for="title" class="text-muted small">Заголовок</label>
                                    <input type="text" class="form-control" id="title" placeholder="Введите заголовок страницы" value="{{ $page->title }}">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="url" class="text-muted small">url</label>
                                    <input type="text" class="form-control" id="url" placeholder="Введите url страницы" value="{{ $page->url }}">
                                    <span class="form-text text-muted">{{ route('url', $page->url) }}</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">published_at
                                        <input type="checkbox"
                                               class="custom-control-input" {{ $page->published_at ? 'checked' : '' }}>
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="template">Шаблон</label>
                                    <select class="form-control" id="template">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    // устанавливаем редактор на всю высоту
    document.getElementById('editor').style.height = window.innerHeight - 96 + 'px';
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
        exec: function (editor) {
            $.post("{{ route('pages.update', $page->id) }}",
                    {_method: 'PUT', _token: $('input[name="_token"]').val(), content: editor.getValue()},
                    function (data) {
                        snackbar(data.message);
                    }
            );
        }, readOnly: true
    });
</script>
<script>
window.Laravel = {csrfToken: '{{ csrf_token() }}'};
var whatContent;

new Vue({
    el: '.panel-page',
    methods: {
        save: function () {
            var formData = {};
            if(whatContent == 'ace'){
                formData.content = editor.getSession().getValue();
            } else {
                formData.content = CKEDITOR.instances['editor1'].getData()
            }
            this.$http.patch('{{ route('pages.update', $page->id) }}', formData).then((response) => {
                snackbar(response.json().message);
            });
        },
        destroy: function () {
            if(confirm("Вы действительно хотите удалить страницу?")) {
                this.$http.delete('{{ route('pages.destroy', $page->id) }}').then((response) => {
                    window.location.href = response.json().redirect_url;
                    snackbar(response.json().message);
                })
            } return false
        }
    }
});
</script>
<script src="{{ asset('panel/js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
   var editor1 = CKEDITOR.replace('editor1', {
//       uiColor: '#000000',
       autoParagraph: false,
       allowedContent: true,
       sourceAreaTabSize: 20,

       filebrowserBrowseUrl: '/panel/js/ckfinder/ckfinder.html',
       filebrowserImageBrowseUrl: '/panel/js/ckfinder/ckfinder.html?type=Images',
       filebrowserUploadUrl: '/panel/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
       filebrowserImageUploadUrl: '/panel/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
   });

   $('#ace').click(function(){
       whatContent = 'ace';
       editor.setValue(CKEDITOR.instances['editor1'].getData());
   });
   $('#ckeditor').click(function(){
       whatContent = 'ckeditor';
       CKEDITOR.instances['editor1'].setData(editor.getValue());
   });
</script>
@endpush
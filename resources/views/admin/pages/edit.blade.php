@extends('admin.main')

@section('title', 'Редактирование страницы')

@section('panel-page')
<div class="btn-group panel-page">
    <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i class="fa fa-step-backward"></i></a>
    <a href="{{ route('pages.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
    <button v-on:click="save" class="btn btn-outline-success"><i class="fa fa-check"></i> СОХРАНИТЬ</button>
    <button v-on:click="destroy" class="btn btn-outline-danger"><i class="fa fa-trash"></i> УДАЛИТЬ</button>
</div>
@endsection

@section('content')
<section class="content" id="edit">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1">НАСТРОЙКИ</a></li>
        <li class="nav-item"><a id="ckeditor" class="nav-link" data-toggle="tab" href="#tab2">РЕДАКТОР</a></li>
        <li class="nav-item"><a id="ace" class="nav-link" data-toggle="tab" href="#tab3">КОД</a></li>
        <li class="nav-item float-lg-right"><a class="nav-link" href="{{ route('url', $page->url) }}" target="_blank" id="page-link">{{ $page->title }}</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="form-group col-lg-6" :class="{'has-danger': errors.title}">
                            <label for="title">Название страницы</label>
                            <input v-model="title" type="text" class="form-control" id="title" placeholder="Введите заголовок страницы" v-bind:value="title">
                            <div class="form-control-feedback" v-for="error in errors.title" v-text="error"></div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="template">Шаблон</label>
                            <select class="form-control" id="template" v-model="template">
                                <option v-for='option in {{ $templateList }}' :value="option.substr(0, option.length - 10)" v-text="option.substr(0, option.length - 10)"></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6" :class="{'has-danger': errors.url}">
                            <label for="url">url</label>
                            <input v-model="url" type="text" class="form-control" id="url" placeholder="Введите url страницы" v-bind:value="url">
                            <div class="form-control-feedback" v-for="error in errors.url" v-text="error"></div>
                            <span class="text-muted" v-text="'{{ url('/') }}/' + url"></span>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="custom-control custom-checkbox"><span v-text="status"></span>
                                <input type="checkbox" v-model="checked"
                                       class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                            <a class="btn btn-outline-info btnMeta" data-toggle="collapse" href="#collapseMeta">META ДАННЫЕ</a>
                        </div>
                    </div>
                    <div class="collapse" id="collapseMeta">
                        <div class="form-group">
                            <label for="meta_title">meta title</label>
                            <input v-model="meta_title" type="text" class="form-control" id="meta_title" placeholder="Введите title страницы" v-bind:value="meta_title">
                        </div>
                        <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="meta_keywords">meta keywords</label>
                            <textarea v-model="meta_keywords" class="form-control" id="meta_keywords" placeholder="Введите keywords страницы" rows="4" v-bind:value="meta_keywords"></textarea>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="meta_description">meta description</label>
                            <textarea v-model="meta_description" class="form-control" id="meta_description" placeholder="Введите description страницы" rows="4" v-bind:value="meta_description"></textarea>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<pre>@{{ $data }}</pre>--}}
        </div>

        <div class="tab-pane fade" id="tab2">
            <textarea title="ckeditor" name="editor1" id="editor1" cols="45" rows="5">{{ $page->content }}</textarea>
        </div>
        <div class="tab-pane fade" id="tab3">
            <textarea title="ace" name="content" style="display: none;"></textarea>
            <div id="editor">{{ $page->content }}</div>
        </div>
    </div>
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
        exec: function () {
            panel.save(); // вызываем функцию сохранения в vue экземляре
        }, readOnly: true
    });
</script>

{{--Редактор ckeditor--}}
<script src="{{ asset('panel/js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    var editor1 = CKEDITOR.replace('editor1', {
        autoParagraph: false,
        allowedContent: true,
        filebrowserBrowseUrl: '/panel/js/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '/panel/js/ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: '/panel/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '/panel/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    });
</script>


{{--vue--}}
<script>
window.Laravel = {csrfToken: '{{ csrf_token() }}'};
var whatContent;

$('#ace').click(function(){
    whatContent = 'ace';
    editor.setValue(CKEDITOR.instances['editor1'].getData());
});
$('#ckeditor').click(function(){
    whatContent = 'ckeditor';
    CKEDITOR.instances['editor1'].setData(editor.getValue());
});

var tab1 = new Vue({
   el: '#tab1',
    data: {
        title: '{{ $page->title }}',
        url: '{{ $page->url }}',
        checked: '{{ $page->status }}',
        template: '{{ $page->template }}',
        meta_title: '{{ $page->meta_title }}',
        meta_keywords: '{{ $page->meta_keywords }}',
        meta_description: '{{ $page->meta_description }}',
        errors: {}
    },
    watch: {
        title: function(str){
            //функция выполняет транслитерацию при вводе текста в поле title
            this.url = translit(str)
        }
    },
    computed: {
        status: function () {
            if(this.checked == 0){
                return 'Страница отключена'
            } else {
                return 'Страница включена'
            }
        }
    }
});

var panel = new Vue({
    el: '.panel-page',
    methods: {
        save: function () { // функция сохранения в базе данных
            var formData = {};
            formData.id = '{{ $page->id }}';
            formData.title = tab1.title;
            formData.url = tab1.url;
            formData.status = tab1.checked;
            formData.template = tab1.template;
            formData.meta_title = tab1.meta_title;
            formData.meta_keywords = tab1.meta_keywords;
            formData.meta_description = tab1.meta_description;

            if(whatContent == 'ace'){
                formData.content = editor.getSession().getValue();
            } else {
                formData.content = CKEDITOR.instances['editor1'].getData()
            }
            this.$http.patch('{{ route('pages.update', $page->id) }}', formData).then(function(response){
                snackbar(response.json().message);
                document.getElementById('page-link').href = '{{ url('/') }}/' + tab1.url;
                document.getElementById('page-link').innerHTML = tab1.title;
                tab1.errors = {};
            }, function(response){
                snackbar(Object.values(response.json())['0']['0']);
                tab1.errors = response.json();
            });
        },
        destroy: function () {
            if(confirm("Вы действительно хотите удалить страницу?")) {
                this.$http.delete('{{ route('pages.destroy', $page->id) }}').then(function(response){
                    window.location.href = response.json().redirect_url;
                    snackbar(response.json().message);
                })
            } return false
        }
    }
});
</script>
@endpush
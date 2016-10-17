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
                <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Настройки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages" role="tab">META</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="home" role="tabpanel">
                <div id="editor">

                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel">2</div>
            <div class="tab-pane fade" id="messages" role="tabpanel">3</div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('panel/js/ace-builds-master/src-min-noconflict/ace.js') }}"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/javascript");
</script>
@endpush
@extends('admin.main')

@section('title', 'Создать страницу')

@section('content')
    <section class="content">
        <div class="panel-page">
            <h4>СОЗДАНИЕ СТРАНИЦЫ</h4>
            <div class="btn-group">
                <a href="{{ URL::previous() }}" class="btn btn-outline-secondary"><i class="fa fa-step-backward"></i></a>
            </div>
        </div>

    </section>
@endsection


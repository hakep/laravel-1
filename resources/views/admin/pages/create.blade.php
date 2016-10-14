@extends('admin.main')

@section('title', 'Создать страницу')

@section('content')
    <section class="content">
        <div class="panel-page">
            <h4>Создать страницу</h4>
            <div class="btn-group" role="group">
                <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
            </div>
        </div>

    </section>
@endsection


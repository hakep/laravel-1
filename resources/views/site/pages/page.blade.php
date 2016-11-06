@extends('site.layouts.main')

@section('title', $page->title)

@section('content')

<section class="container">
    <div class="row">
        <div class="col-md-2 p-l-0">
            <div class="sidebar-left">
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-item"><a class="nav-link" href="#">sidebar 1</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">sidebar 2</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">sidebar 3</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">sidebar 4</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">sidebar 5</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">sidebar 6</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-10 p-a-0">
            <div class="content p-a-1">
                <h1>{{ $page->title }}</h1>
                {!! $page->content !!}
            </div>
        </div>
    </div>
</section>
@endsection


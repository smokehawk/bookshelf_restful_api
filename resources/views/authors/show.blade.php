@extends('layout')

@section('title') - {{$author->full_name}}@endsection

@section('content')
    <div class="outer d-flex flex-column justify-content-center bg-light" style="height: 80vh;">
        <div class="container">
            <div class="col-md-6 offset-md-3 mb-4 d-flex align-items-center">
                <div class="card">
                    <img src="/images/author.jpg" alt="author" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title">{{$author->full_name}}</h2>
                        <p class="card-text">Книг на полке: {{$author->books->count()}}</p>
                        <p class="card-text">Биография: {{$author->bio}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

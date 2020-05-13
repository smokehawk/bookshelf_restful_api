@extends('layout')

@section('title') - {{$book->title}}@endsection

@section('content')
    @include('inc/header')
    <div class="outer d-flex flex-column justify-content-center bg-light" style="height: 100vh;">
        <div class="container">
            <div class="card">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-5 pt-0 pb-0">
                        <img src="/images/book-cover.jpg" class="card-img" alt="book cover">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h2 class="card-title">{{$book->title}}</h2>
                            <p class="card-text">Автор: {{$book->author->full_name}}</p>
                            <p class="card-text">
                            <p class="card-text">Дата
                                выпуска: {{$book->published_at ? $book->published_at : 'нет данных'}}</p>
                            <p class="card-text">Аннотация: {{$book->annotation}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc/footer')
@endsection

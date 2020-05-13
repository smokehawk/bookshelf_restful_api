@extends('layout')

@section('title') - Все книги@endsection

@section('content')
    @include('inc/header')
    <div class="inner bg-light">
        <div class="container">
            <h2 class="display-3 font-weight-normal text-center mb-3 ">Книги</h2>
            <div class="row">
                @forelse($books as $book)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card">
                            <a href="{{route('books.show',$book)}}" role="button"><img
                                    src="/images/book-cover.jpg"
                                    alt="book cover"
                                    class="card-img-top"></a>

                            <div class="card-body">
                                <h3 class="h5 card-title">{{$book->title}}</h3>
                                <p class="card-text">Автор: {{$book->author->full_name}}</p>
                                <p class="card-text">Дата
                                    выпуска: {{$book->published_at ? $book->published_at : 'нет данных'}}</p>
                                <a class="btn btn-info" href="{{route('books.show',$book)}}" role="button">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @empty <p>Книг пока нет...</p>
                @endforelse
            </div>
        </div>
    </div>
    @include('inc/footer')
@endsection



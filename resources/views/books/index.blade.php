@extends('layout')

@section('title') - Все книги@endsection

@section('content')
    <div class="inner bg-light">
        <div class="container">
            <h2 class="display-3 font-weight-normal text-center mb-3 ">Книги</h2>
            @canany(['updateContent','useAdminPanel'])
                @php $can_update = true @endphp
            @endcanany
            @if($can_update ?? '')
                <div class="row">
                    <a href="{{route('books.create')}}" class="ml-auto mr-3 btn btn-dark">Добавить
                        книгу</a>
                </div>
                <hr>
            @endif
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
                                @if($can_update ?? '')
                                    <a class="btn btn-secondary" href="{{route('books.edit',$book)}}"
                                       role="button">Редактировать</a>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            @empty
                <div class="col-md-12 text-center">
                    <p>Книг пока нет...</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection



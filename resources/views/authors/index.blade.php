@extends('layout')

@section('title') - Авторы@endsection

@section('content')
    @include('inc/header')
    <div class="inner bg-light">
        <div class="container">
            <h2 class="display-3 font-weight-normal text-center mb-3">Авторы</h2>
            <div class="row">
                @forelse($authors as $author)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card">
                            <a href="{{route('authors.show',$author)}}" role="button"><img
                                    src="/images/author.jpg" alt="author" class="card-img-top"></a>

                            <div class="card-body">
                                <h3 class="h5 card-title">{{$author->full_name}}</h3>
                                <p class="card-text">Книг на полке: {{$author->books->count()}}</p>
                                <a class="btn btn-info" href="{{route('authors.show',$author)}}"
                                   role="button">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @empty <p>Авторов пока нет...</p>
                @endforelse
            </div>
        </div>
    </div>
    @include('inc/footer')
@endsection



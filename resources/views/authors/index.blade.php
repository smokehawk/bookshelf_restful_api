@extends('layout')

@section('title') - Авторы@endsection

@section('content')
    <div class="inner bg-light">
        <div class="container">
            <h2 class="display-3 font-weight-normal text-center mb-3">Авторы</h2>
            @can('create')
                <div class="row">
                    <a href="{{route('authors.create')}}" class="ml-auto mr-3 btn btn-dark">Добавить
                        автора</a>
                </div>
                <hr>
            @endcan
            @can('update')
                @php $can_update = true @endphp
            @endcan
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
                                @if($can_update ?? '')
                                    <a class="btn btn-secondary" href="{{route('authors.edit',$author)}}"
                                       role="button">Редактировать</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <p>Авторов пока нет...</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection



@extends('layout')

@section('title') - Редактирование книги@endsection

@section('content')
    <div class="inner bg-light pt-3 pb-3">
        <div class="container">
            <h2 class="text-center">Редактирование книги</h2>
            <form method="POST" action="/books/{{$book->id}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title" class="label">
                        Название книги
                    </label>

                    <div class="control">
                        <input
                            class="form-control @error('title') {{'is-invalid'}}@enderror"
                            type="text"
                            name="title"
                            id="title"
                            value="{{$book->title}}"
                        >
                    </div>
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="annotation" class="label">
                        Аннотация
                    </label>

                    <div class="control">
                    <textarea
                        class="form-control @error('annotation') {{'is-invalid'}}@enderror"
                        name="annotation"
                        id="annotation">{{$book->annotation}}</textarea>
                    </div>
                    @error('annotation')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="published_at" class="label">
                        Дата выпуска
                    </label>

                    <div class="control">
                        <input
                            class="form-control @error('published_at') {{'is-invalid'}}@enderror"
                            type="date"
                            name="published_at"
                            max="{{date('o-m-d')}}"
                            id="published_at"
                            value="{{$book->published_at}}"
                        >
                    </div>
                    @error('published_at')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author_id" class="author_id">
                        Автор
                    </label>
                    <select
                        name="author_id"
                        id="author_id"
                        class="form-control @error('published_at') {{'is-invalid'}}@enderror">
                        @foreach($authors as $author)
                            <option value="{{$author->id}}"
                                {{$book->author_id === $author->id ? ' selected' : ''}}>
                                {{$author->full_name}}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="control">
                        <button class="btn btn-primary" type="submit">Изменить</button>
                    </div>
                </div>
            </form>

            <form method="POST" action="/books/{{$book->id}}">
                @csrf
                @method('DELETE')
                <div class="control">
                    <button class="btn btn-danger" type="submit">Удалить</button>
                </div>
            </form>
        </div>
    </div>
@endsection

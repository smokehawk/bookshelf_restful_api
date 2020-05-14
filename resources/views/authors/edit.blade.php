@extends('layout')

@section('title') - Редактирование автора@endsection

@section('content')
    <div class="inner bg-light pt-3 pb-3">
        <div class="container">
            <h2 class="text-center">Редактирование автора</h2>
            <form method="POST" action="/authors/{{$author->id}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="full_name" class="label">
                        Полное имя
                    </label>
                    <div class="control">
                        <input
                            class="form-control @error('full_name') {{'is-invalid'}}@enderror"
                            type="text"
                            name="full_name"
                            id="full_name"
                            value="{{$author->full_name}}"
                        >
                    </div>
                    @error('full_name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bio" class="label">
                        Биография
                    </label>

                    <div class="control">
                    <textarea
                        class="form-control @error('bio') {{'is-invalid'}}@enderror"
                        name="bio"
                        id="bio">{{$author->bio}}</textarea>
                    </div>
                    @error('bio')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="control">
                        <button class="btn btn-primary" type="submit">Изменить</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/authors/{{$author->id}}">
                @csrf
                @method('DELETE')
                <div class="control">
                    <button class="btn btn-danger" type="submit">Удалить</button>
                </div>
            </form>
        </div>
    </div>
@endsection

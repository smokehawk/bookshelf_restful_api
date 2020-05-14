@extends('layout')

@section('title') - Новый автор@endsection

@section('content')
    <div class="inner bg-light pt-3 pb-3">
        <div class="container">
            <h2 class="text-center">Новый автор</h2>
            <form method="POST" action="/authors">
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
                            value="{{old('full_name')}}"
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
                        id="bio">{{old('bio')}}</textarea>
                    </div>
                    @error('bio')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="control">
                        <button class="btn btn-primary" type="submit">Добавить автора</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

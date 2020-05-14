@extends('layout')

@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title title--underscored m-b-md">
                    КнижнаяПолка
                </div>

                <div class="links">
                    <a href="{{route('books.index')}}">Книги</a>
                    <a href="{{route('authors.index')}}">Авторы</a>
                    <a target="_blank" href="https://github.com/smokehawk/bookshelf_restful_api">GitHub</a>
                </div>
            </div>
        </div>
    </div>
@endsection

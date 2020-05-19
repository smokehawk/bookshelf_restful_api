@extends('layout')

@section('title') - Редактирование пользователя@endsection

@section('content')
    <div class="inner bg-light pt-3 pb-3">
        <div class="container">
            <h2 class="text-center">Редактирование пользователя</h2>
            <form method="POST" action="/users/{{$user->id}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="label">
                        Имя пользователя
                    </label>

                    <div class="control">
                        <input
                            class="form-control @error('name') {{'is-invalid'}}@enderror"
                            type="text"
                            name="name"
                            id="name"
                            value="{{$user->name}}"
                        >
                    </div>
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="label">
                        E-Mail
                    </label>

                    <div class="control">
                        <input
                            class="form-control @error('email') {{'is-invalid'}}@enderror"
                            type="email"
                            name="email"
                            id="email"
                            value="{{$user->email}}"
                        >
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="role_id" class="label">
                        Роль
                    </label>
                    <select
                        name="role_id"
                        id="role_id"
                        class="form-control @error('role_id') {{'is-invalid'}}@enderror">
                        <option value="" selected>Пользователь</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}"
                                {{$user->role_id === $role->id ? ' selected' : ''}}>
                                {{$role->label}}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    @if($user->role)
                        <p>{{$user->role->description}}</p>
                    @else
                        <p>Обыкновенный пользователь</p>
                    @endif

                </div>
                <div class="form-group">
                    <div class="control">
                        <button class="btn btn-primary" type="submit">Изменить</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/users/{{$user->id}}">
                @csrf
                @method('DELETE')
                <div class="control">
                    <button
                        class="btn btn-danger"
                        type="submit"
                    @if($user->isAdmin()){{'disabled'}} @endif>Удалить
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

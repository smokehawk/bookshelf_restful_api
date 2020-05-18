@extends('/layout')

@section('title') - Пользователи@endsection

@section('content')
    <div class="container">
        <h2 class="display-3 font-weight-normal text-center mb-3 ">Пользователи</h2>
        <div class="row">
            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">ИД</th>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row" class="align-middle">{{$user->id}}</th>
                        <td class="align-middle">{{$user->name}}</td>
                        <td class="align-middle">{{$user->email}}</td>
                        <td class="align-middle">{{$user->role->label ?? 'Пользователь'}}</td>
                        <td class="align-middle">
                            <a href="/users/{{$user->id}}/edit" class="btn btn-secondary">Редактировать</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection

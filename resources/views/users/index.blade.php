@extends('layouts.app')

@section('title')
Пользователи
@endsection

@section('content')
<table class="table table-bordered">
    <thead>
        <th>#id</th>
        <th>Имя</th>
        <th>e-mail</th>
        <th>Дата регистрации</th>
        <th>Управление</th>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}">Редактирование</a> &nbsp;
                        <!-- <a href="{{ route('users.destroy', ['user' => $user->id]) }}"></button>Удаление</button></a> -->
                        
                        <button type="submit" class="btn btn-danger">Удаление</button>                      
                    </form>
                </td>
            </tr>
        @empty
            <tr colspan="5">
                <h3>Записей не найдено</h3>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
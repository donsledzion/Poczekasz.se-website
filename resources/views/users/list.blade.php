@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Imię</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('users/show',['id'=>$user->id]) }}">Pokaż</a>
                        <a class="btn btn-primary" href="{{ route('users/edit',['id'=>$user->id]) }}">Edytuj</a>
                        <a class="btn btn-danger" href="{{ route('users/delete',['id'=>$user->id]) }}">Usuń</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if(Auth::user()->permissions >= 256)
    <center><div class="pull-right">
        <a class="btn btn-success" href="{{ route('users.create') }}"> Dodaj użytkownika</a>
    </div></center>
    @endif
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
                        @if(Auth::user()->permissions >= 256 && Auth::user()->id != $user->id)
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                        @endif
                        @if(Auth::user()->permissions >= 128)
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Pokaż</a>
                        @endif
                        @if(Auth::user()->permissions >= 256)
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edytuj</a>
                        @endif
                        @if(Auth::user()->permissions >= 256 && Auth::user()->id != $user->id)
                            <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

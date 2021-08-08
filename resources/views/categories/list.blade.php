@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if(Auth::user()->permissions >= 256)
    <center><div class="pull-right">
        <a class="btn btn-success" href="{{ route('categories.create') }}"> Dodaj kategorię</a>
    </div></center>
    @endif
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if(Auth::user()->permissions >= 256)
                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edytuj</a>
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

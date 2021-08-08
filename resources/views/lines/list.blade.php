@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if(Auth::user()->permissions >= 256)
    <center><div class="pull-right">
        <a class="btn btn-success" href="{{ route('lines.create') }}"> Dodaj linię</a>
    </div></center>
    @endif
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Status</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lines as $line)
                <tr>
                    <th scope="row">{{ $line->id }}</th>
                    <td>{{ $line->line_name }}</td>
                    <td>
                        @if ($line->status==1)
                            Aktywna
                        @else
                            Nieaktywna
                        @endif
                    </td>
                    <td>
                            <form action="{{ route('lines.destroy',$line->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('lines.edit',$line->id) }}">Edytuj</a>
                            <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

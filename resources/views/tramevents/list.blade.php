@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if(Auth::user()->permissions >= 256)
    <center><div class="pull-right">
        <a class="btn btn-success" href="{{ route('tramevents.create') }}"> Dodaj wydarzenie</a>
    </div></center>
    @endif
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa wydarzenia</th>
                <th scope="col">Autor</th>
                <th scope="col">Linia</th>
                <th scope="col">Kategoria</th>
                <th scope="col">Status Posta</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tramevents as $tramEvent)
                <tr>
                    <th scope="row">{{ $tramEvent->id }}</th>
                    <td>{{ $tramEvent->title }}</td>
                    <td>{{$tramEvent->author->name}}</td>
                    <td>{{$tramEvent->line->line_name ?? "Brak"}}</td>
                    <td>{{$tramEvent->eventcategory->name ?? "Brak"}}</td>
                    <td>{{ $tramEvent->post_status }}</td>
                    @if(!is_null($tramEvent->image_path))
                        <td><img height=100px width="200px" src="{{asset('storage/'.$tramEvent->image_path)}}"></td>
                    @else
                        <td>Brak obrazka</td>
                    @endif
                        <td>

                        @if(Auth::user()->permissions >= 256)
                            <form action="{{ route('tramevents.destroy',$tramEvent->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                        @endif
                        @if(Auth::user()->permissions >= 128)
                            <a class="btn btn-info" href="{{ route('tramevents.show',[$tramEvent->id]) }}">Pokaż</a>
                        @endif
                        @if(Auth::user()->permissions >= 256)
                            <a class="btn btn-primary" href="{{ route('tramevents.edit',$tramEvent->id) }}">Edytuj</a>
                        @endif
                        @if(Auth::user()->permissions >= 256)
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

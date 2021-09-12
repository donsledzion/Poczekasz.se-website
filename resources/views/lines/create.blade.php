@extends('layouts.app')

@section('content')
    <center>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dodaj nową linię MPK Wrocław</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lines.index') }}"> Wróć</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>O cholibka!</strong> Jest problem z tym co wpisałeś.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lines.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nazwa:</strong>
                    <input type="text" name="line_name" style="height:50px; width:150px" class="form-control" placeholder="Nazwa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control @error('category_id') is-invalid @enderror" style="height:50px; width:150px" name="status">
                        <option value="0">Nieaktywna</option>
                        <option value="1">Aktywna</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Potwierdź</button>
            </div>
        </div>

    </form>
    </center>
@endsection

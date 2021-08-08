@extends('layouts.app')

@section('content')
    <center>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dodaj nowe wydarzenie z wrocławskiego MPK</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Wróć</a>
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

    <form action="{{ route('tramevents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nazwa:</strong>
                    <input type="text" name="title" style="height:50px; width:175px" class="form-control" placeholder="Nazwa wydarzenia">
                    <input type="text" name="author_id" value="{{Auth::User()->id ?? null}}" class="invisible form-control hidden" placeholder="Author id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Linia:</strong>
                    <select class="form-control @error('line_id') is-invalid @enderror" style="height:50px; width:200px" name="line_id">
                        <option value="">Brak</option>
                        @foreach ($lines as $line)
                            <option value="{{$line->id}}">{{$line->line_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategoria:</strong>
                    <select class="form-control @error('eventcategory_id') is-invalid @enderror" style="height:50px; width:300px" name="eventcategory_id">
                        @foreach ($eventcategories as $eventcategory)
                            <option value="{{$eventcategory->id}}">{{$eventcategory->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Obrazek:</strong>
                    <input name="image" type="file" @error('image') is-invalid @enderror>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Potwierdź</button>
            </div>
        </div>

    </form>
    </center>
@endsection

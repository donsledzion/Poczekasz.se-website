@extends('layouts.app')

@section('content')
    <center><div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edytuj TramEvent</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Wróć</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tramevents.update',$tramEvent->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nazwa wydarzenia</strong>
                    <input type="text" name="title" style="width:500px" value="{{ $tramEvent->title }}" class="form-control" placeholder="Tytuł">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Autor:</strong>
                    <textarea class="form-control" style="height:150px; width:500px" name="author_id" placeholder="Email" value="{{$tramEvent->author_id}}" hidden></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Linia</strong>
                    <select class="form-control @error('eventcategory_id') is-invalid @enderror" style="height:50px; width:300px" name="eventcategory_id">
                        @foreach ($lines as $line)
                            <option value="{{$line->id}}" @if($tramEvent->isSelectedLine($line->id)) selected @endif>{{$line->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategoria</strong>
                    <select class="form-control @error('eventcategory_id') is-invalid @enderror" style="height:50px; width:300px" name="eventcategory_id">
                        @foreach ($eventcategories as $eventcategory)
                            <option value="{{$eventcategory->id}}" @if($tramEvent->isSelectedCategory($eventcategory->id)) selected @endif>{{$eventcategory->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status Posta</strong> <!--- Tutaj przerobić bez foreacha --->
                    <select class="form-control @error('post_status') is-invalid @enderror" style="height:50px; width:300px" name="post_status">
                            <option value="0" @if($tramevent->isSelectedStatus(0)) selected @endif>{{(new \App\Models\TramEvent)->StatusName(0)}}</option>
                            <option value="1" @if($tramevent->isSelectedStatus(1)) selected @endif>{{(new \App\Models\TramEvent)->StatusName(1)}}</option>
                            <option value="2" @if($tramevent->isSelectedStatus(2)) selected @endif>{{(new \App\Models\TramEvent)->StatusName(2)}}</option>
                            <option value="3" @if($tramevent->isSelectedStatus(3)) selected @endif>{{(new \App\Models\TramEvent)->StatusName(3)}}</option>
                            <option value="4" @if($tramevent->isSelectedStatus(4)) selected @endif>{{(new \App\Models\TramEvent)->StatusName(4)}}</option>
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

@extends('layouts.app')

@section('content')
    @php
        use App\Models\EventCategory;
        use App\Models\User;
        use App\Models\Line;
        $user=User::find($tramEvent->author_id);
        $line=Line::find($tramEvent->line_id);
        $category=EventCategory::find($tramEvent->category_id);
    @endphp
    <center>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Lista Wydarzeń</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('tramevents.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nazwa:</strong>
                    {{ $tramEvent->title }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Autor:</strong>

                    {{$user->name ?? "Anonim";}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Linia:</strong>

                    {{$line->line_name ?? "Nieokreślona";}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategoria:</strong>

                    {{$category->name ?? "Nieokreślona";}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status posta:</strong>
                    {{ $tramEvent->post_status }}
                </div>
            </div>
        </div>
    </center>
@endsection

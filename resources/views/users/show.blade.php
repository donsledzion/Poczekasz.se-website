@extends('layouts.app')

@section('content')
    <center>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Lista Użytkowników</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nazwa:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ranga:</strong>
                    @if($user->permissions == 16)
                        Użytkownik
                    @endif
                    @if($user->permissions == 32)
                        VIP
                    @endif
                    @if($user->permissions == 128)
                        Mod
                    @endif
                    @if($user->permissions == 256)
                        Administrator
                    @endif
                </div>
            </div>
        </div>
    </center>
@endsection

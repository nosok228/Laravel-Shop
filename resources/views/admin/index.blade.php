@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Админ панель</h1>

        @if(isset($success))
            <h1 style="color:green">{{ $success }} </h1>
        @endif

        @if(isset($error))
                <h1 style="color:red">{{ $error }} </h1>
        @endif

    </main>
@stop
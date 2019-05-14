@extends('main')

@section('title','Amigos')

@section('content')
<div class="container-fluid">
    <h2>Amigos:</h2>
    @if(isset($friends))
    <table class="table">
        <thead>
        <th scope="col">Nombre</th>
        </thead>
        <tbody>
        @foreach ($friends as $friend)
        <tr>
            <th scope="row"><h5>{{ $friend->name }}</h5> <br>
                @if(!$friend->accepted)
                Solicitud pendiente
                @endif
            </th>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
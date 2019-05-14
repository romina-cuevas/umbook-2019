@extends('main')

@section('title','Solicitudes de amistad')

@section('content')
    <div class="container-fluid">
        <h2>Solicitudes:</h2>
        @if(isset($friend_requests))
            <table class="table">
                <thead>
                <th scope="col">Nombre</th>
                </thead>
                <tbody>
                @foreach ($friend_requests as $request)
                    <tr>
                        <th scope="row"><h5>{{ $request->name }}</h5> <br>
                            ¿Quieres aceptar la solicitud de amistad?
                        </th>
                        <td><a class="btn btn-success" href="{{route('confirm.friend').'?user_id='.$request->user_id}}" role="button">Aceptar solicitud</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
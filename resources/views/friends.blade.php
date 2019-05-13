@extends('main')

@section('title','Home')

@section('content')
<div class="container-fluid">
    @if(isset($friends))
      <table class="table">
        <thead>
          <th scope="col">Name</th>
        </thead>
        <tbody>
          @foreach ($friends as $friend)
            <tr>
              <th scope="row">{{ $friend->name }}</th>
              <td><a class="btn btn-danger" href="route('delete.friend').'?friend='.$user->id" role="button">Eliminar</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
</div>
@endsection
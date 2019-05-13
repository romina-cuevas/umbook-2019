@extends('main')

@section('title','Home')

@section('content')
<div class="container-fluid">
    <div class="text-center">
        @if (isset($message))
            <div class="alert alert-warning"> {{ $message }} </div>
        @endif
        <h4>¡Busca tus amigos!</h4>
        <form action="/member/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" class="form-control" name="name_search" placeholder="Ingresa nombre o apellido"> <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
        </form>
    </div>
    @if(isset($users))
      <table class="table">
        <thead>
          <th scope="col">Name</th>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $user->name }}</th>
              <td><a class="btn btn-primary" href="{{route('add.friend').'?friend='.$user->id}}" role="button">Agregar</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
</div>
@endsection

@section('js')
<script>
  /*
    $("#round").easyAutocomplete({
       url: function(search) {
           return "{{route('users.search')}}?search=" + search;
       },
     
       getValue: "name",

       list: {
            match: {
                enabled: true
            },
            maxNumberOfElements: 6,

            showAnimation: {
                type: "slide",
                time: 300
            },
            hideAnimation: {
                type: "slide",
                time: 300
            }
        },

        theme: "round"
    });
    */
</script>
@endsection

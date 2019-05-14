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
                        <th scope="row">{{ $user->first_name . ' ' . $user->last_name }}</th>
                        <td><a class="btn btn-primary" href="{{route('add.friend').'?friend='.$user->id}}" role="button">Agregar</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="container-fluid mt-5">
        <a href="{{route('groups.create')}}" class="btn btn-primary">Crear grupo de Amigos</a><br><br>
        <h4>Mis grupos</h4>
        <div class="row mt-3">
            @if(!is_null(Auth::user()->groups))
                @foreach(Auth::user()->groups as $group)
                    <div class="col-md-3 ml-5">
                        <div class="card " style="width: 18rem;">
                            <div class="card-body">
                                <h3 class="card-title">{{$group->name}}</h3>
                                @foreach($group->friends as $friend)
                                    {{$friend->friend_id}}
                                @endforeach
                            </div>
                            <div class="text-center mb-3">
                                <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-warning"><i class="fas fa-wrench"></i>
                                </a>
                                <a href="{{ route('group.destroy', $group->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            @endif
        </div>
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

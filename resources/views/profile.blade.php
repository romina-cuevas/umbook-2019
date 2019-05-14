@extends('main')

@section('title','Home')

@section('content')

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

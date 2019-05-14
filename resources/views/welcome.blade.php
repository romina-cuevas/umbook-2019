@extends('main')

@section('title','Umbook')

@section('content')
<div class="container">
  <div class="text-center">
    @guest
	    <h1>Bienvenido!</h1>
	    <h4>Crea una cuenta <br> Es gratis y lo será siempre.</h4>
    @else
      <a class="btn btn-primary" href="{{ route('home') }}" role="button"><i class="fas fa-search"></i> Busca a tus amigos </a><br><br>
      <a class="btn btn-primary" href="{{ route('friends.index') }}" role="button"><i class="fas fa-user-friends"></i> Ver amigos </a>
	@endguest

  </div>
    

</div>
@endsection
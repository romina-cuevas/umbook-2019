@extends('main')

@section('title','Umbook')

@section('content')
<div class="container">
  <div class="text-center">
    @guest
	    <h1>Bienvenido!</h1>
	    <h4>Crea una cuenta <br> Es gratis y lo será siempre.</h4>
    @else
    	<h2><a href="home">Busca a tus amigos: </a></h2>
	@endguest

  </div>
    

</div>
@endsection
@extends('main')

@section('title','Nuevo Grupo')

@section('content')
<div>
	<h3>Nuevo Grupo</h3>
			{!! Form::open(['route'=>'groups.store', 'method'=>'POST','files'=>'true']) !!}
					<div class="form-group">
					{!! Form::label('name','Nombre del Grupo*') !!}
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Grupo','required']) !!}
					</div>

	  				
					<div class="form-group">
					{!! Form::label('friends','Amigos*') !!}
					{!! Form::select('friends[]',$friends,null,['class'=>'form-control select-friends','multiple']) !!}
					</div>

			<div class="form-group">
				{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
			</div>

			{!! Form::close() !!}
</div>

@endsection

@section('js')
	<script>

		$('.select-friends').chosen({
			placeholder_text_multiple:'Seleccione al menos 3 amigos',
			no_results_text: "Oops, no hay tags parecido a ",
			search_contains:true,

		});

	</script>

@endsection
@extends('main')

@section('title','Editar Grupo: ' .$group->name)

@section('content')
<div>
	<h3>Editar Grupo: {{$group->name}} </h3>
			{!! Form::open(['route'=>['groups.update',$group], 'method'=>'PUT']) !!}
					<div class="form-group">
					{!! Form::label('name','Nombre del Grupo*') !!}
					{!! Form::text('name',$group->name,['class'=>'form-control','placeholder'=>'Grupo','required']) !!}
					</div>

	  				
					<div class="form-group">
					{!! Form::label('friends','Amigos*') !!}
					{!! Form::select('friends[]',$friends,$group_friends,['class'=>'form-control select-friends','multiple']) !!}
					</div>

			<div class="form-group">
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
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
@extends('main')

@section('title','Home')

@section('content')
<div class="container">
    <div class="text-center">
        <h4>¡Busca tus amigos!</h4>
        <div class="input-group mb-3">          
          <input id="round" type="text" class="form-control" placeholder="Mis Amigos!" aria-label="Username" aria-describedby="basic-addon1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
          </div>
        </div>
    </div>

</div>
@endsection

@section('js')
<script>
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
</script>

@endsection
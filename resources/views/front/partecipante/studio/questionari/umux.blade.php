@extends('front.master')

@section('content')


<div class="container">
 <form action="#" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

       <label class="text-center"><strong class="h2"> Questionario UMUX-Lite </strong></label>
     
    <table class="table table-hover" >
       <!--<table class="table table-bordered">-->
       <thead>
          <tr>
             <th width="65%"></th>
             <th width="7%" style="text-align:center;">Fortemente in disaccordo</th>
             <th width="7%"></th>
             <th width="7%"></th>
             <th width="7%"></th>
             <th width="7%"></th>
             <th width="7%"></th>
             <th width="7%" style="text-align:center;">Fortemente d'accordo</th>
          </tr>
       </thead>
       <tbody>
          <!--<tr class="dispari">-->
          <tr>
             <td class="prova"> 1. Le caratteristiche del sito web incontrano le mie necessità</td>
             <td><input type="Radio" id="Item1" name="Item1" value=1 required></td>
             <td><input type="Radio" id="Item1" name="Item1" value=2 required></td>
             <td><input type="Radio" id="Item1" name="Item1" value=3 required></td>
             <td><input type="Radio" id="Item1" name="Item1" value=4 required></td>
             <td><input type="Radio" id="Item1" name="Item1" value=5 required></td>
             <td><input type="Radio" id="Item1" name="Item1" value=6 required></td>
             <td><input type="Radio" id="Item1" name="Item1" value=7 required></td>
          </tr>
          <tr>
             <td class="prova"> 2. Questo sito web è facile da usare</td>
             <td><input type="Radio" id="Item2" name="Item2" value=1 required></td>
             <td><input type="Radio" id="Item2" name="Item2" value=2 required></td>
             <td><input type="Radio" id="Item2" name="Item2" value=3 required></td>
             <td><input type="Radio" id="Item2" name="Item2" value=4 required></td>
             <td><input type="Radio" id="Item2" name="Item2" value=5 required></td>
             <td><input type="Radio" id="Item2" name="Item2" value=6 required></td>
             <td><input type="Radio" id="Item2" name="Item2" value=7 required></td>
          </tr>
       </tbody>
    </table>
    <button id="btnSubmit" type="submit" class="btn btn-success center-block">
            <span class="glyphicon glyphicon-ok"></span> Salva questionario
        </button>
 </form>
</div>
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        
        $("form").submit(function(event){
           event.preventDefault();

           var formData = {
			'Item1' : $("input[name='Item1']:checked").val(),
			'Item2' : $("input[name='Item2']:checked").val()
           }
           console.log(formData);
           $.ajax({
			url: '{{route('partecipante.studio.questionario.umux.store', ['idstudio' => session()->get('id_studio_execute')])}}',
			type: 'POST',
			dataType: 'json',
			data: formData,
			success: function(data){
				console.log(data),
				$('#btnSubmit').attr("disabled", true);
				$('#btnSubmit').text("Inviato!");
			}
		});
        });
</script>
@endsection

@section('navbar')

@include('front.partecipante.studio.navbar')

@endsection

@section('style')

<style>
th.intestazione{
    text-align: center; 
    width:10%;
    }
td:not(.prova){
    text-align: center;
    }    

</style>
@endsection
@extends('front.master')

@section('content')

<div class="container">
    <form action="#" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <h2 class="text-center">Questionario SUS</h2>
       <table class="table table-hover" >
          <!--<table class="table table-bordered">-->
          <thead>
             <tr>
                <th width="65%"></th>
                <th width="7%" style="text-align:center;">Fortemente in disaccordo</th>
                <th width="7%"></th>
                <th width="7%"></th>
                <th width="7%"></th>
                <th width="7%" style="text-align:center;">Fortemente d'accordo</th>
             </tr>
          </thead>
          <tbody>
             <!--<tr class="dispari">-->
             <tr>
                <td class="prova"> 1. Penso che mi piacerebbe utilizzare questo sito frequentemente</td>
                <td><input type="Radio" id="Item1" name="Item1" value=1 required></td>
                <td><input type="Radio" id="Item1" name="Item1" value=2 required></td>
                <td><input type="Radio" id="Item1" name="Item1" value=3 required></td>
                <td><input type="Radio" id="Item1" name="Item1" value=4 required></td>
                <td><input type="Radio" id="Item1" name="Item1" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 2. Ho trovato il sito inutilmente complesso</td>
                <td><input type="Radio" id="Item2" name="Item2" value=1 required></td>
                <td><input type="Radio" id="Item2" name="Item2" value=2 required></td>
                <td><input type="Radio" id="Item2" name="Item2" value=3 required></td>
                <td><input type="Radio" id="Item2" name="Item2" value=4 required></td>
                <td><input type="Radio" id="Item2" name="Item2" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 3. Ho trovato il sito molto semplice da usare</td>
                <td><input type="Radio" id="Item3" name="Item3" value=1 required></td>
                <td><input type="Radio" id="Item3" name="Item3" value=2 required></td>
                <td><input type="Radio" id="Item3" name="Item3" value=3 required></td>
                <td><input type="Radio" id="Item3" name="Item3" value=4 required></td>
                <td><input type="Radio" id="Item3" name="Item3" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 4. Penso che avrei bisogno del supporto di una persona già in grado di utilizzare il sito</td>
                <td><input type="Radio" id="Item4" name="Item4" value=1 required></td>
                <td><input type="Radio" id="Item4" name="Item4" value=2 required></td>
                <td><input type="Radio" id="Item4" name="Item4" value=3 required></td>
                <td><input type="Radio" id="Item4" name="Item4" value=4 required></td>
                <td><input type="Radio" id="Item4" name="Item4" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 5. Ho trovato le varie funzionalità del sito bene integrate</td>
                <td><input type="Radio" id="Item5" name="Item5" value=1 required></td>
                <td><input type="Radio" id="Item5" name="Item5" value=2 required></td>
                <td><input type="Radio" id="Item5" name="Item5" value=3 required></td>
                <td><input type="Radio" id="Item5" name="Item5" value=4 required></td>
                <td><input type="Radio" id="Item5" name="Item5" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 6. Ho trovato incoerenze tra le varie funzionalità del sito </td>
                <td><input type="Radio" id="Item6" name="Item6" value=1 required></td>
                <td><input type="Radio" id="Item6" name="Item6" value=2 required></td>
                <td><input type="Radio" id="Item6" name="Item6" value=3 required></td>
                <td><input type="Radio" id="Item6" name="Item6" value=4 required></td>
                <td><input type="Radio" id="Item6" name="Item6" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 7. Penso che la maggior parte delle persone possano imparare ad utilizzare il sito facilmente </td>
                <td><input type="Radio" id="Item7" name="Item7" value=1 required></td>
                <td><input type="Radio" id="Item7" name="Item7" value=2 required></td>
                <td><input type="Radio" id="Item7" name="Item7" value=3 required></td>
                <td><input type="Radio" id="Item7" name="Item7" value=4 required></td>
                <td><input type="Radio" id="Item7" name="Item7" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 8. Ho trovato il sito molto difficile da utilizzare </td>
                <td><input type="Radio" id="Item8" name="Item8" value=1 required></td>
                <td><input type="Radio" id="Item8" name="Item8" value=2 required></td>
                <td><input type="Radio" id="Item8" name="Item8" value=3 required></td>
                <td><input type="Radio" id="Item8" name="Item8" value=4 required></td>
                <td><input type="Radio" id="Item8" name="Item8" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 9. Mi sono sentito a mio agio nell’utilizzare il sito </td>
                <td><input type="Radio" id="Item9" name="Item9" value=1 required></td>
                <td><input type="Radio" id="Item9" name="Item9" value=2 required></td>
                <td><input type="Radio" id="Item9" name="Item9" value=3 required></td>
                <td><input type="Radio" id="Item9" name="Item9" value=4 required></td>
                <td><input type="Radio" id="Item9" name="Item9" value=5 required></td>
             </tr>
             <tr>
                <td class="prova"> 10. Ho avuto bisogno di imparare molti processi prima di riuscire ad utilizzare </td>
                <td><input type="Radio" id="Item10" name="Item10" value=1 required></td>
                <td><input type="Radio" id="Item10" name="Item10" value=2 required></td>
                <td><input type="Radio" id="Item10" name="Item10" value=3 required></td>
                <td><input type="Radio" id="Item10" name="Item10" value=4 required></td>
                <td><input type="Radio" id="Item10" name="Item10" value=5 required></td>
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
			'Item2' : $("input[name='Item2']:checked").val(),
			'Item3' : $("input[name='Item3']:checked").val(),
			'Item4' : $("input[name='Item4']:checked").val(),
			'Item5' : $("input[name='Item5']:checked").val(),
			'Item6' : $("input[name='Item6']:checked").val(),
			'Item7' : $("input[name='Item7']:checked").val(),
			'Item8' : $("input[name='Item8']:checked").val(),
			'Item9' : $("input[name='Item9']:checked").val(),
            'Item10' : $("input[name='Item10']:checked").val()
           }
console.log(formData);
           $.ajax({
			url: '{{route('partecipante.studio.questionario.sus.store', ['idstudio' => session()->get('id_studio_execute')])}}',
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
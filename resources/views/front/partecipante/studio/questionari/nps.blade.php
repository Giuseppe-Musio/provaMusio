@extends('front.master') @section('content')

<div class="container">
	<h2 class="text-center">QUESTIONARIO NPS</h2>
	<hr>

	<h4 class="text-center">Con quanta probabilit&#224 consiglieresti questo sito ad un amico o ad un conoscente?</h4>
<div class="row text-center">
	<form name="myForm" action="#" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="btnClicked" value="0">
		<div style="text-align:center;display: inline-block;padding:0px">
			<p style="width:55px;text-align:center;font-family:segoe ui;padding:0px;margin:0 auto;font-size:70%">Non lo consiglierei affatto</p>
			<input type="button" class="button" value="1" name="btn_item" style="width:50px;margin:2px auto">
		</div>
		<input type="button" class="button button2" value="2" name="btn_item">
		<input type="button" class="button button3" value="3" name="btn_item">
		<input type="button" class="button button4" value="4" name="btn_item">
		<input type="button" class="button button5" value="5" name="btn_item">
		<input type="button" class="button button6" value="6" name="btn_item">
		<input type="button" class="button button7" value="7" name="btn_item">
		<input type="button" class="button button8" value="8" name="btn_item">
		<input type="button" class="button button9" value="9" name="btn_item">
		<input type="button" class="button button10" value="10" name="btn_item">
		<div style="text-align:center;display: inline-block;padding:0px">
			<p style="width:55px;text-align:center;font-family:segoe ui;padding:0px;margin:0 auto;font-size:70%">Lo consiglierei sicuramente</p>
			<input type="button" class="button button11" value="11" name="btn_item" style="width:50px;margin:2px auto">
		</div>
<br>
    <!--	<input type="submit" class="btn btn-default" style="display:block;margin:0 auto;margin-top:2%;width:10%; background-color:#d0d0d0"> -->
    <button id="btnSubmit" type="submit" class="btn btn-success center-block">
            <span class="glyphicon glyphicon-ok"></span> Salva questionario
        </button>

    </form>
</div>
</div>
<script>
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });

        $("form").submit(function (event){
            event.preventDefault();
            var value = $("input[name='btnClicked']").val();
    
            if (value != 0){
                var dataString = {'value' : value};
                $.ajax({
                    url: '{{route('partecipante.studio.questionario.nps.store', ['idstudio' => session()->get('id_studio_execute')])}}',
                    type: 'POST',
	        		dataType: 'json',
                    data: dataString,
                    success: function(data){
                        console.log(data);
                        $('#btnSubmit').attr("disabled", true);
                        $('#btnSubmit').text("Inviato!");
                    }
                })
                return;
            }
        
            window.alert("Per favore, inserire un valore");
            return;
        });
        

    $("input[name='btn_item']").click(function(){
        $("input[name='btnClicked']").val($(this).val());
        console.log($(this).val());   
    })

</script>
@endsection @section('navbar') @include('front.partecipante.studio.navbar') @endsection @section('style')
<style>
	.button {
		background-color: #C90000;
		border: none;
		color: white;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 15px;
		margin: 4px 2px;
		cursor: pointer;
		border-radius: 10px;
		width: 50px;
		height: 40px;
		outline: none;

		border: none;
		border-bottom: 2px solid rgb(157, 157, 157);
		border-right: 2px solid rgb(157, 157, 157);
	}

	.button.button2 {
		background-color: #D00000;
	}

	.button.button3 {
		background-color: #D50000;
	}

	.button.button4 {
		background-color: #E00000;
	}

	.button.button5 {
		background-color: #E90000;
	}

	.button.button6 {
		background-color: #F40000;
	}

	.button.button7 {
		background-color: #FF0000;
	}

	.button.button8 {
		background-color: #FFBB00;
	}
	/* giallo scuro */

	.button.button9 {
		background-color: #FFD000;
	}
	/* giallo */

	.button.button10 {
		background-color: #11D000;
	}
	/*verde */

	.button.button11 {
		background-color: #10BE00;
	}
	/* verde scuro */

	.button:hover {

		background-color: #b6b6b6;
	}

	.button.clicked {

		opacity: 0.4;
		filter: alpha(opacity=40);
		border: none;
		border-top: 2px solid rgb(157, 157, 157);
		border-left: 2px solid rgb(157, 157, 157);
	}
</style>
@endsection
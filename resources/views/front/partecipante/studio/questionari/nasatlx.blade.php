@extends('front.master')

@section('content')


    <h1 class="text-center">Questionario NASA TLX</h1>

    <button class="btn btn-secondary center-block" style="margin-bottom: 5px;" onclick="$('#istruzioni').fadeToggle();"><span class="glyphicon glyphicon-info-sign"></span> Istruzioni per la compilazione</button>
    <div id="istruzioni" class="well" hidden>
        <p class="text-center">Il questionario sottostante viene utilizzato per esaminare il carico di lavoro impiegato per raggiungere l'obiettivo del task. I fattori che influenzano il carico di lavoro possono variare a seconda del task. Ad esempio, la quantità di stress, frustrazione o di sforzo mentale percepita durante l'esecuzione del task. Per valutare il carico di lavoro saranno usate sei diverse scale: prima di rispondere leggere attentamente la descrizione delle scale. Nella colonna <i>&quot;Scala&quot;</i> della tabella sono presenti le scale e le relative descrizioni. Nella colonna <i>&quot;Valutazione&quot;</i> invece, sono presenti degli slider che possono essere trascinati verso il valore che si vuole attribuire alla scala. Una volta scelto il valore per una scala, spostare lo slider corrispondente verso sinistra (Poco) o verso destra (Molto). Infine premere il pulsante <i>&quot;Salva questionario&quot;</i> sotto la tabella. Per domande relative al significato di una scala oppure all'utilizzo del questionario, rivolgersi al facilitatore. </p>
    </div>

    <form id="nasatlxForm" action="#" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="text-center">SCALA</th>
                    <th class="text-center">VALUTAZIONE</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="col-md-8">
                        <p>
                            <strong>Sforzo mentale</strong>
                        </p>
                        <p>
                            Quanto sforzo mentale è stato richiesto (ad esempio memorizzare, ricordare, decidere, calcolare, cercare, ecc.)?
                        </p>
                    </td>
                    <td class="col-md-4" style="vertical-align: middle;"><div id="mentalDemandSlider" class="center-block" style="max-width: 80%"></div></td>
                </tr>
                <tr>
                    <td class="col-md-8">
                        <p>
                            <strong>Sforzo fisico</strong>
                        </p>
                        <p>
                            Quanta attività fisica è stata richiesta (ad esempio cliccare, controllare, attivare)?
                        </p>
                    </td>
                    <td class="col-md-4" style="vertical-align: middle;"><div id="physicalDemandSlider" class="center-block" style="max-width: 80%"></div></td>
                </tr>
                <tr>
                    <td class="col-md-8">
                        <p>
                            <strong>Sforzo temporale</strong>
                        </p>
                        <p>
                            Quanta pressione del tempo è stata avvertita a causa della velocità con la quale sono stati presentati gli elementi del task?
                        </p>
                    </td>
                    <td class="col-md-4" style="vertical-align: middle;"><div id="temporalDemandSlider" class="center-block" style="max-width: 80%"></div></td>
                </tr>
                <tr>
                    <td class="col-md-8">
                        <p>
                            <strong>Prestazioni</strong>
                        </p>
                        <p>
                            Quanto si pensa di aver raggiunto l'obiettivo del task?
                        </p>
                    </td>
                    <td class="col-md-4" style="vertical-align: middle;"><div id="performanceSlider" class="center-block" style="max-width: 80%"></div></td>
                </tr>
                <tr>
                    <td class="col-md-8">
                        <p>
                            <strong>Fatica</strong>
                        </p>
                        <p>
                            Quanto lavoro (mentale e fisico) è stato utilizzato per raggiungere l'obiettivo del task?
                        </p>
                    </td>
                    <td class="col-md-4" style="vertical-align: middle;"><div id="effortSlider" class="center-block" style="max-width: 80%"></div></td>
                </tr>
                <tr>
                    <td class="col-md-8">
                        <p>
                            <strong>Frustrazione</strong>
                        </p>
                        <p>
                            Quanta irritazione, stress e noia è stata percepita durante l'esecuzione del task?
                        </p>
                    </td>
                    <td class="col-md-4" style="vertical-align: middle;"><div id="frustrationSlider" class="center-block" style="max-width: 80%"></div></td>
                </tr>
            </tbody>
        </table>
        <button id="btnSubmit" type="submit" class="btn btn-success center-block">
            <span class="glyphicon glyphicon-ok"></span> Salva questionario
        </button>
        <div id="message" class="text-center" style="display: none;"></div>
    </form>

<script src="{{ URL::asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery-ui-slider-pips.js') }}"></script>
<script>
$(document).ready(function() {
	//inizializzazione di tutti gli slider della pagina.
	createSlider('#mentalDemandSlider');
	createSlider('#physicalDemandSlider');
	createSlider('#temporalDemandSlider');
	createSlider('#performanceSlider');
	createSlider('#effortSlider');
    createSlider('#frustrationSlider');
});

function createSlider(sliderID) {
	//inizializzazione di uno slider utilizzando jqueryui.
	$(sliderID).slider({
		value: 50,
		min: 0,
		max: 100,
		step: 5
	}).slider("pips", {
		labels: {
			'first': "Poco",
			'last': "Molto" }
		});
}

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$("form").submit(function(event){
   event.preventDefault();

		//lettura dei valori di tutte le risposte.
		var formData = {
			'mentalDemand' : $('#mentalDemandSlider').slider("option", "value"),
			'physicalDemand' : $('#physicalDemandSlider').slider("option", "value"),
			'temporalDemand' : $('#temporalDemandSlider').slider("option", "value"),
			'performance' : $('#performanceSlider').slider("option", "value"),
			'effort' : $('#effortSlider').slider("option", "value"),
			'frustration' : $('#frustrationSlider').slider("option", "value")
        };
        
        console.log(formData);

		//chiamata ajax per l'invio delle risposte al server.
		$.ajax({
			url: '{{ route('partecipante.studio.questionario.nasatlx.store', ['idstudio' => session()->get('id_studio_execute'), 'idtask' => $idtask]) }}',
			type: 'POST',
			dataType: 'json',
			data: formData,
			success: function(responseData) {
                console.log(responseData);
                $('#btnSubmit').attr("disabled", true);
                $('#btnSubmit').text("Inviato!");
            }
		})
		
	});
</script>
@endsection

@section('navbar')
@include('front.partecipante.studio.navbar')
@endsection

@section('style')
<link href="{{ URL::asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/jquery-ui-slider-pips.css') }}" rel="stylesheet">

@endsection
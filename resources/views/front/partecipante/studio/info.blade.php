@extends('front.master') @section('content')

<div class="jumbotron">
	<div class="container">
		<h1>Informazioni</h1>
		<p class="lead">Modalità di esecuzione e avviso sulla privacy</p>
		<hr class="my-4">
		<p>All'inizio di ogni task verrà visualizzata una descrizione delle operazioni da effettuare. Una volta eseguiti, cliccare
			sul tasto
			<strong class="mark">Task successivo</strong> nel caso in cui si desideri visualizzare nuovamente il comando da effettuare, premere sul pulsante 
			<strong class="mark">Info</strong>sarà possibile in qualsiasi momento effettuare l'uscita dallo studio con 
			<strong class="mark">Interrompi studio</strong>.
		</p>
		<hr class="my-4">
		<p>
			Durante l'esecuzione dello studio potrebbero essere effettuate:
			<ul>
				<li>Registrazione audio</li>
				<li>Registrazione video</li>
				<li>Rilevamento attività mouse</li>
			</ul>
		</p>
		<p>
			 <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <div class="pull-right">
							<a class="btn btn-danger btn-lg" href="{{ route('partecipante.home') }}"
									role="button">Annulla</a>
						<a class="btn btn-success btn-lg" href="{{ route('partecipante.studio.nextjob',['idstudio' => session()->get('id_studio_execute') ])}}"
								role="button">Avanti</a>
					  </div>
					</div>
				  </div>
		</p>
	</div>
</div>

@endsection
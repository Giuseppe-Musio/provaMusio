<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">

			<!-- Branding Image -->
			<a class="navbar-brand" href="#">
				{{ config('app.name','UTassistant') }}
			</a>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">
				&nbsp;
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@guest
				<li>
					<a href="{{ route('welcome') }}">Login</a>
				</li>
				@else 
				<li id="cronometro">
					<a href="#" style="pointer-events: none; cursor: default;">
					  <span class="h4">
				
					@if(isset($task))
					<span id="time">00:00</span>
						@endif
					  </span>
					  &nbsp;&nbsp;&nbsp;</a>
			  </li>
				@if(Session::get('queue_job')->last() == null)
				<li>
					<a id="stopandsave" href="#">Fine</a>
				</li>
				@else @if(key(Session::get('queue_job')->last()) == 'task')
				<li>
					<a id="stopandsave" href="{{ route('partecipante.studio.nextjob',['idstudio' => session()->get('id_studio_execute') ])}}">
						<span class="glyphicon glyphicon-forward"></span> Task successivo</a>
				</li>
				<li>
					<a href="{{ route('partecipante.studio.interrompi', ['idstudio' => session()->get('id_studio_execute')]) }}">
						<span class="glyphicon glyphicon-stop"></span> Interrompi</a>
				</li>
				@endif @if(key(Session::get('queue_job')->last()) == 'questionario')
				<li>
					<a id="stopandsave" href="{{ route('partecipante.studio.nextjob',['idstudio' => session()->get('id_studio_execute') ]) }}">
						<span class="glyphicon glyphicon-forward"></span> Compila questionario</a>
				</li>
				<li>
					<a href="{{ route('partecipante.studio.interrompi', ['idstudio' => session()->get('id_studio_execute')]) }}">
						<span class="glyphicon glyphicon-stop"></span> Interrompi</a>
				</li>
				@endif @endif @endguest
			</ul>
		</div>
	</div>
</nav>
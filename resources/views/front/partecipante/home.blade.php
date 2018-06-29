@extends('front.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			@forelse($lista as $item)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">
						{{$item->study->goal}}
					</h3>
					@if ($item->flag_complete == 0)
					<a href="{{route('partecipante.studio.index',[$item->study])}}">
						<button class="btn btn-default pull-right">Avvia studio</button>
					</a>
					@endif
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">{{$item->study->description}}</div>
			</div>
			@empty

			<h3>Non ci sono studi da eseguire</h3>

			@endforelse
		</div>
	</div>
</div>
@endsection

@section('navbar')
@include('front.navbar')
@endsection
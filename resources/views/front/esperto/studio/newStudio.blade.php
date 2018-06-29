@extends('front.master') @section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div>
                <div class="panel text-center"><h1>Creazione Studio</h1></div>
                <div class="">
                    <div id="mainInformationsTitle" class="bg-primary text-light text-center col-md-4 col-sm-4 col-xs-4 col-lg-4"><h4>Informazioni
                            Principali</h4></div>
                    <div id="taskDefinitionTitle" class="text-center col-md-4 col-md-4 col-sm-4 col-xs-4 col-lg-4"><h4>Definizione Task</h4></div>
                    <div id="joinTesterTitle" class="text-center col-md-4 col-md-4 col-sm-4 col-xs-4 col-lg-4"><h4>Invita Partecipanti</h4></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 10px; margin-bottom: 40px;">
        <form id="studioForm" class="form-horizontal" method="POST" action="{{ route('esperto.studio.createStudio') }}">
            {{ csrf_field() }}

            <div id="mainInformations" style="display: block">
                @include ('front.esperto.studio.mainInformations')
            </div>
            <div id="taskDefinition" style="display: none">
                @include ('front.esperto.studio.taskDefinition')
            </div>
            <div id="joinTester" style="display: none">
                @include ('front.esperto.studio.joinTester')
            </div>
        </form>
    </div>
@endsection

@section('navbar')
@include('front.navbar')
@endsection
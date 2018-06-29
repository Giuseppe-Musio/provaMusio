@extends('front.master')

@section('content')
    <script type="text/javascript" src="{{ URL::asset('assets/js/plugin/testerInvite.js') }}"></script>

    <div class="row">
        <form id="studioForm" class="form-horizontal" method="POST" action="{{ route('esperto.addNewTester') }}">
            {{ csrf_field() }}
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Partecipanti Registrati</div>
                    <div class="panel-body">
                        @php $i=0; @endphp
                        @forelse($array_testers as $value)
                            @if($i==0)
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Invita</th>
                                    </tr>
                                    </thead>
                                    @endif
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>
                                            <button id="buttonJoinInvite{{$i}}" type="button" class="btn btn-primary"
                                                    onclick="showHideButton(this)">
                                                Invita Partecipante
                                            </button>
                                            <button id="buttonRemoveInvite{{$i}}" type="button"
                                                    name="buttonRemoveInvite{{$i}}"
                                                    value="{{$value->email}}" class="btn btn-danger"
                                                    style="display: none"
                                                    onclick="showHideButton(this)">
                                                Cancella Invito
                                            </button>
                                            <div style="display: none">
                                                <label id="input_emailTesterInvite{{$i}}"
                                                       for="emailTesterInvite{{$i}}"></label>
                                                <input id="emailTesterInvite{{$i}}" type="text"
                                                       name="emailTesterInvite{{$i}}" readonly="readonly">
                                            </div>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @empty
                                        <h3>Tutti i tester sono stati invitati a questo Studio!</h3>
                                    @endforelse
                                </table>
                                <div style="display: none">
                                    <label id="id_input_study" for="id_study"></label>
                                    <input id="id_study" type="text" name="id_study" value="{{$id_study}}"
                                           readonly="readonly">
                                </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Partecipanti Non Registrati</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label id="inputTesterNotRegistred" for="testerNotRegistred"
                                       class="control-label">Email:</label>
                            </div>

                            <div class="col-md-8" style="margin-top: 5px">
                                <input id="testerNotRegistred" type="text" class="form-control"
                                       name="testerNotRegistred"
                                       placeholder="Scrivi l'Email del partecipante non registrato" autofocus>
                            </div>

                            <div class="col-md-4">
                                <button id="testerNotRegistredButton" style="margin-top: 5px" type="button"
                                        class="btn btn-primary" onclick="addToQueue()">
                                    Aggiungi all'Elenco
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label id="inputEmailAdded" for="emailAdded" class="control-label">Elenco:</label>
                            </div>
                            <div class="col-md-8" style="margin-top: 5px">
                                <textarea rows="4" cols="50" id="emailAdded" type="text" class="form-control"
                                          style="resize: none" name="emailAdded" readonly="readonly"
                                          autofocus></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <a href="{{ route('esperto.home') }}" class="btn btn-primary pull-left"
                           style="margin-top: 20px">Annulla</a>
                        <button type="button" style="margin-top: 20px;" class="btn btn-primary pull-right"
                                onclick="joinNewTester()">
                            Conferma
                        </button>
                    </div>
                </div>
            </div>

            <!------------------------------------------------------------------------------------------------------------>
            <!-------------------------FINESTRA MODALE PER LA CONFERMA IN CASO NON SI INVITASSERO TESTER------------------>
            <!------------------------------------------------------------------------------------------------------------>

            <div id="modalJoinTester" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Invito dei Partecipanti allo Studio!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Confermi di voler invitare i Partecipanti selezionati?</p>
                        </div>
                        <div class="modal-footer">
                            <a onclick="submitAll('modalJoinTester')" class="btn btn-primary" data-dismiss="modal">Conferma</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="ErrorJoinTester" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Attenzione!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Non hai selezionato nessun Partecipante. Selezionane almeno uno.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modalEmailWrong" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Attenzione!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>L'email inserita non è corretta!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modalEmailAlreadyInserted" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Attenzione!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Hai già inserito questa mail!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="domMessage" style="display: none;">
        <div style="width: 100%; height: 100px; padding-top: 15px">
            <img src="{{URL::asset('assets/images/spinner.gif')}}" class="center-block" style="max-height: 100%;"/>
        </div>
        <div style="width: 100%; height: 100px; padding-top: 15px">
            <div class="text-center" style="padding-top: 15px;">
                <span><strong><h3>Invito dei partecipanti in corso...</h3></strong></span>
            </div>
        </div>
    </div>
@endsection

@section('navbar')
    @include('front.navbar')
@endsection
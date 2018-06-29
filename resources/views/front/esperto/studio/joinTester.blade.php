<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Partecipanti Registrati</div>
        <div class="panel-body">
            @php $i=0; @endphp
            @forelse($data as $value)
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
                            <td>{{$value['name']}}</td>
                            <td>{{$value['email']}}</td>
                            <td>
                                <button id="buttonJoinInvite{{$i}}" class="btn btn-primary" type="button"
                                        onclick="showHideButton(this)">
                                    Invita Partecipante
                                </button>
                                <button id="buttonRemoveInvite{{$i}}" name="buttonRemoveInvite{{$i}}"
                                        value="{{$value['email']}}" class="btn btn-danger" style="display: none"
                                        type="button" onclick="showHideButton(this)">
                                    Cancella Invito
                                </button>
                                <div style="display: none">
                                    <label id="input_emailTesterInvite{{$i}}" for="emailTesterInvite{{$i}}" />
                                    <input id="emailTesterInvite{{$i}}" type="text" name="emailTesterInvite{{$i}}"
                                           readonly="readonly">
                                </div>
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @empty
                            <h3>Nessun Tester registrato!</h3>
                        @endforelse
                    </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Partecipanti Non Registrati</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-md-12">
                    <label id="inputTesterNotRegistred" for="testerNotRegistred" class="control-label">Email:</label>
                </div>

                <div class="col-md-8" style="margin-top: 5px">
                    <input id="testerNotRegistred" type="text" class="form-control" name="testerNotRegistred"
                           placeholder="Scrivi l'Email del partecipante non registrato" autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="col-md-4">
                    <button id="testerNotRegistredButton" style="margin-top: 5px" type="button" class="btn btn-primary"
                            onclick="addToQueue()">Aggiungi all'Elenco
                    </button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8">
                    <label id="inputEmailAdded" for="emailAdded" class="control-label">Elenco:</label>
                </div>
                <div class="col-md-8" style="margin-top: 5px">
                    <textarea rows="4" cols="50" id="emailAdded" type="text" class="form-control" style="resize: none"
                              name="emailAdded" readonly="readonly" autofocus ></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button id="joinTesterPreviousButton" style="margin-top: 20px;" type="button"
                    class="btn btn-primary pull-left" onclick="previousStep(this)">
                Torna Indietro
            </button>
            <button style="margin-top: 20px;" type="button" class="btn btn-primary pull-right"
                    onclick="verifyJoinedTester()">
                Crea Studio
            </button>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------>
<!-------------------------FINESTRA MODALE PER LA CONFERMA IN CASO NON SI INVITASSERO TESTER------------------>
<!------------------------------------------------------------------------------------------------------------>

<div id="modalConfirmJoinTester" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attenzione!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Non hai invitato nessun partecipante. Vuoi comunque creare lo studio?<br>In ogni caso i partecipanti
                    potranno essere aggiunti successivamente.</p>
            </div>
            <div class="modal-footer">
                <a id="buttonConfirm" onclick="submitAll('modalConfirmJoinTester')" class="btn btn-primary" data-dismiss="modal">Crea Studio</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
            </div>
        </div>
    </div>
</div>

<div id="modalConfirmCreationStudio" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Creazione Studio!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="confirmCreation" class="modal-body" style="display: block;">
                <p>Conferma per creare lo studio.</p>
            </div>
            <div class="modal-footer">
                <a id="buttonConfirm" onclick="submitAll('modalConfirmCreationStudio')" class="btn btn-primary" data-dismiss="modal">Crea Studio</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
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

<div id="domMessage" style="display: none;">
    <div style="width: 100%; height: 100px; padding-top: 15px">
        <img src="{{URL::asset('assets/images/spinner.gif')}}" class="center-block" style="max-height: 100%;"/>
    </div>
    <div style="width: 100%; height: 100px; padding-top: 15px">
        <div class="text-center" style="padding-top: 15px;">
            <span><strong><h3>Creazione dello studio in corso...</h3></strong></span>
        </div>
    </div>
</div>




<div class="col-md-8 col-md-offset-2">
    @php $i=1 @endphp
    @include('front.esperto.studio.formTask', ['i' => $i])

    <div class="form-group">
        <div class="col-md-12">
            <button id="taskDefinitionPreviousButton" style="margin-top: 20px;" type="button" class="btn btn-primary pull-left"
                    onclick="previousStep(this)">
                Torna Indietro
            </button>
            <button id="taskDefinitionNextButton" style="margin-top: 20px;" type="button" class="btn btn-primary pull-right" onclick="nextStep(this)">
                Passo Successivo
            </button>
        </div>
    </div>

    <div class="page-center">
        <button id="AddTaskButton" type="button" class="btn btn-success" onclick="addTask()">
            Aggiungi Task
        </button>
        <label for="numberOfTasks" style="display: none"></label>
        <input id="numberOfTasks" name="numberOfTasks" style="display: none" readonly="readonly">
    </div>

</div>

<div style="display: none" id="dataErrorTaskDefinition" class="alert alert-danger error-message" role="alert"><b>Attenzione!!!</b> Alcuni dati non sono stati inseriti!!</div>

<script type="text/javascript" src="{{ URL::asset('assets/js/plugin/numberInput.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugin/studioTask.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugin/testerInvite.js') }}"></script>
<div id="task{{$i}}" class="panel panel-default">
    <div id="title{{$i}}" class="panel-heading">
        <span>Task {{$i}}</span>
        <div class="pull-right">
            <button id="remove_button{{$i}}" type="button" class="btn-xs btn-danger" style="display: none" onclick="removeTask(this)">
                Rimuovi Task
            </button>
        </div>
    </div>
    <div class="panel-body">
        <div id="div-goal{{$i}}" class="form-group">
            <div class="col-md-8">
                <label id="input_goal{{$i}}" for="goal{{$i}}" class="control-label">Obiettivo:</label>
            </div>

            <div class="col-md-12" style="margin-top: 5px">
                <input id="goal{{$i}}" type="text" class="form-control" name="goal{{$i}}" placeholder="Specificare l'obiettivo del task" onblur="validateText(this)" required autofocus>
            </div>
        </div>

        <div id="div-time_max{{$i}}" class="form-group">
            <div class="col-md-8">
                <label id="input_time_max{{$i}}" for="time_max{{$i}}" class="control-label">Durata stimata (minuti):</label>
            </div>

            <div class="col-md-12" style="margin-top: 5px">
                <input id="time_max{{$i}}" type="text" class="form-control" name="time_max{{$i}}" value=5 placeholder="Inserire la durata stimata desiderata." onkeyup="checkNumberInput(this)" onblur="validateNumber(this)" required autofocus>
            </div>
        </div>

        <div id="div-start_url{{$i}}" class="form-group">
            <div class="col-md-8">
                <label id="input_start_url{{$i}}" for="start_url{{$i}}" class="control-label">URL d'inizio del Task:</label>
            </div>

            <div class="col-md-12" style="margin-top: 5px">
                <div class="input-group">
                    <span class="input-group-addon">http(s)://</span>
                    <input id="start_url{{$i}}" type="text" class="form-control" name="start_url{{$i}}" placeholder="Es. www.esempio.it" onblur="validateURL(this)" required autofocus>
                </div>
            </div>
        </div>

        <div id="div-end_url{{$i}}" class="form-group">
            <div class="col-md-8">
                <label id="input_end_url{{$i}}" for="end_url{{$i}}" class="control-label">URL da raggiungere per completare il task correttamente:</label>
            </div>

            <div class="col-md-12" style="margin-top: 5px">
                <div class="input-group">
                    <span class="input-group-addon">http(s)://</span>
                    <input id="end_url{{$i}}" type="text" class="form-control" name="end_url{{$i}}" placeholder="Es. www.esempio.it/contatti" onblur="validateURL(this)" required autofocus>
                </div>
            </div>
        </div>

        <div id="div-instruction{{$i}}" class="form-group">
            <div class="col-md-8">
                <label id="input_instruction{{$i}}" for="instruction{{$i}}" class="control-label">Descrizione:</label>
            </div>

            <div class="col-md-12" style="margin-top: 5px">
                <textarea rows="4" cols="50" id="instruction{{$i}}" type="text" class="form-control" style="resize: none" name="instruction{{$i}}" placeholder="Descrivere le istruzioni del task" onblur="validateText(this)" required autofocus></textarea>
            </div>
        </div>

        @php $i=0; @endphp
    </div>
</div>

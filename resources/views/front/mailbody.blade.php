<div class="text-center">
    <h1>
        UTAssistant
    </h1>
</div>
<hr>
<br/>
@if($user->id != null)
    <div class="maincontent">
        <div class="text-center">
            <h2>Gentile {{ $user->name }} ({{$user->email}}),</h2>
            <p><h3>è stato invitato a partecipare allo studio:</h3></p>
            <p><h1> {{ $studio->goal }} </h1></p>
            <p><h3>Cordiali saluti</h3></p>
            <p><h2>UTAssistant Staff</h2></p>
        </div>
    </div>
@else
    <div class="maincontent">
        <div class="text-center">
            <h2>Gentile {{$user->email}},</h2>
            <p><h3>è stato invitato a partecipare allo studio:</h3></p>
            <p><h1> {{ $studio->goal }} </h1></p>
            <p><h3>prima di poterlo eseguire, è necessario registrarsi alla piattaforma.</h3></p>
            <p><h3>Cordiali saluti</h3></p>
            <p><h2>UTAssistant Staff</h2></p>
        </div>
    </div>
@endif


<style type="text/css">
    .maincontent {
        background-color: #FFF;
        margin: auto;
        padding: 20px;
        width: 450px;
        border-top: 2px solid #27ae60;
    }
</style>
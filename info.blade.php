@extends('front.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p>Il sistema Tester e il sistema User sono integrati all’interno della piattaforma UTAssistant. In homepage, un unico modulo per il login, consente sia agli esperti d’usabilità sia ai partecipati di accedere ai sotto-sistemi Tester e User, rispettivamente.</p>
            <p>Il sistema Tester consente ad un esperto d’usabilità la creazione di uno o più studi definendone:</p>
            <ul>
                <li>Titolo ;</li>
                <li>URL Sito da valutare;</li>
                <li>Istruzioni per il partecipante;</li>
                <li>Questionario da somministrare al partecipante al termine dello studio;</li>
                <li>Tipi di dati che il sistema&nbsp;<em>User</em>&nbsp;dovrà automaticamente catturare durante lo studio, per esempio, lo screen capture, click e movimento del mouse, l’audio/video della webcam dell’utente;</li>
                <li>Una lista di task caratterizzati da titolo, descrizione e durata massima;</li>
                <li>Utenti che partecipano allo studio tramite l’inserimento della loro email.</li>
            </ul>
            <p>Gli utenti invitati a partecipare allo studio ricevono un’email di notifica contenente un link per l’ingresso al sistema Tester che li guida nell’esecuzione dello studio. Lo studio può anche essere avviato entrando nel sistema Tester mediante apposito login nel sistema.</p>
            <p>Quando un partecipante avvia uno studio, il sistema Tester mostra all’utente un messaggio che notifica la raccolta di dati sensibili. Se il partecipante accetta di proseguire, il sistema mostra la descrizione dello studio&nbsp;prima di iniziare l’erogazione dei task.</p>
            <p>All’inizio di ogni task, il sistema mostra al partecipante il titolo, l’obiettivo del task e un pulsante “Avvia” per iniziare l’esecuzione del task. Cliccando sul pulsante start il sistema mostra a pieno schermo il sito da valutare; una toolbar in alto visualizza costantemente titolo e descrizione del task, come anche i pulsanti per avanzare al task successivo o abbandonare lo studio.</p>
            <p>Finita l’esecuzione di tutti i task, viene erogato un questionario (se impostato dall’esperto d’usabilità). Finita la compilazione del questionario lo studio è concluso.</p>
            <p>L’analisi dei risultati dello studio è offerta dalle funzionalità che sono&nbsp;elencate&nbsp;nell'home&nbsp;page del sistema&nbsp;Tester, nel menu "Opzioni"&nbsp;accanto&nbsp;ad ogni&nbsp;studio creato.</p>
        </div>
    </div>
@endsection

@section('navbar')
@include('front.navbar')
@endsection
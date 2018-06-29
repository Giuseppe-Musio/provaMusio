<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Definizione Studio</div>
        <div class="panel-body">
            <div id="div-goal" class="form-group">
                <div class="col-md-8">
                    <label for="goal" class="control-label">Titolo:</label>
                </div>

                <div class="col-md-12" style="margin-top: 5px">
                    <input id="goal" type="text" class="form-control" name="goal"
                           placeholder="Inserire il Titolo dello Studio" onblur="validateText(this)" required autofocus >
                </div>
            </div>

            <div id="div-url" class="form-group">
                <div class="col-md-8">
                    <label for="url" class="control-label">URL:</label>
                </div>

                <div class="col-md-12" style="margin-top: 5px">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" id="buttonChoice" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">http:// <span id="spanCaret" class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li id="liHttpChoice" class="active"><a id="httpChoice" onclick="selectHttpChoice(this)" style="cursor: pointer;">http://</a></li>
                                <li id="liHttpsChoice"><a id="httpsChoice" onclick="selectHttpChoice(this)" style="cursor: pointer;">https://</a></li>
                            </ul>
                            <div style="display: none"><input id="prefixUrl" type="text" name="prefixUrl" readonly="readonly"></div>
                        </div><!-- /btn-group -->
                        <input id="url" type="text" class="form-control" name="url"
                               placeholder="Es. www.esempio.it" required autofocus onblur="validateURL(this)">
                    </div>
                </div>
            </div>

            <div id="div-description" class="form-group">
                <div class="col-md-8">
                    <label for="description" class="control-label">Descrizione:</label>
                </div>
                <div class="col-md-12" style="margin-top: 5px">
                    <textarea rows="4" cols="50" id="description" class="form-control" style="resize: none"
                              name="description" placeholder="Descrivere l'obiettivo dello studio" required autofocus onblur="validateText(this)"></textarea>
                </div>
            </div>

            <div id="div-checkInput" class="form-group">
                <div class="col-md-12">
                    <fieldset id="fieldset-checkInput">
                        <div id="div-checkInput">
                            <legend>
                                <h4>Input da Catturare</h4>
                            </legend>
                            <div>
                                Selezionare una o più delle seguenti tipologie di rilevamento dati. In fase di valutazione,
                                i risultati dello studio saranno visualizzati in base ai dati che si desidera raccogliere
                                durante l'esecuzione del test.
                            </div>
                            <div style="margin-top: 10px;" class="input-group">
                                <div>
                                    <input class="radio-inline" id="recordAudio" name="recordAV" type="radio"
                                           value="audio" onclick="validateCheck(this)">
                                    <label for="recordAudio">Registra audio</label>
                                </div>
                                <div>
                                    <input class="radio-inline" id="recordAudioVideo" name="recordAV" type="radio"
                                           value="video" onclick="validateCheck(this)">
                                    <label for="recordAudioVideo">Registra video</label>
                                </div>
                                <div>
                                    <input class="radio-inline" id="recordMouseMoving" name="recordMouseMoving"
                                           type="checkbox" value="mouseMoving" onclick="validateCheck(this)">
                                    <label for="recordMouseMoving">Registra attività del mouse</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <fieldset>
                        <legend>
                            <h4>Questionario da Somministrare</h4>
                        </legend>
                        <div>
                            Selezionare il questionario da somministrare al termine dello studio.
                            <button type="button" class="btn btn-info pull-right" data-toggle="modal"
                                    data-target="#myModal">
                                Info
                            </button>
                        </div>
                        <div style="margin-top: 10px;">
                            <div>
                                <input id="attrakdiff" name="attrakdiff" type="checkbox" value="attrakdiff">
                                <label for="attrakdiff">Questionario ATTRAKDIFF</label>
                            </div>
                            <div>
                                <input id="sus" name="sus" type="checkbox" value="sus">
                                <label for="sus">Questionario SUS</label>
                            </div>
                            <div>
                                <input id="nps" name="nps" type="checkbox" value="nps">
                                <label for="nps">Questionario NPS</label>
                            </div>
                            <div>
                                <input id="nasatlx" name="nasatlx" type="checkbox" value="nasatlx">
                                <label for="nasatlx">questionario NASA TLX (al completamento di ogni task)</label>
                            </div>
                            <div>
                                <input id="umux" name="umux" type="checkbox" value="umux">
                                <label for="umux">questionario UMUX-lite</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button id="mainInformationsNextButton" style="margin-top: 20px;" type="button"
                    class="btn btn-primary pull-right"
                    onclick="nextStep(this)">
                Passo Successivo
            </button>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------>
<!------------------------------Finestra di dialogo delle Info------------------------------------------------>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Questionari</h4>
            </div>
            <div class="modal-body">
                    <span> La <strong>System Usability Scale(SUS)</strong> fornisce un affidabile strumento "veloce e sporco" per misurare l'usabilità. Consiste in un questionario di 10 elementi con cinque opzioni di risposta per gli intervistati; da "Pienamente d'accordo" a "Pienamente in disaccordo".<br>Esso consente di valutare una vasta gamma di prodotti e servizi, tra cui hardware, software, dispositivi mobili, siti web e applicazioni.<br>
                <br><strong>AttrakDiff</strong> rende possibile la valutazione anonima di qualsiasi prodotto da parte di utenti, clienti, ecc. Dalla valutazione dei dati è possibile valutare quanto è piacevole il prodotto in termini di usabilità e di aspetto, e se è necessaria un'ottimizzazione.<br>Consiste in un questionario di 28 elementi con sette opzioni di risposta in base all'intensità delle voci. I poli di ogni elemento sono aggettivi opposti.<br>
                <br>Il <strong>Net Promoter Score(NPS)</strong> è uno strumento di gestione che può essere usato per valutare la fedeltá in una relazione impresa-cliente.<br>È un'alternativa alla tradizionale ricerca di soddisfazione del cliente e dichiara di essere correlata con la crescita dei ricavi.<br>L'NPS è calcolato in base alle risposte ad una singola domanda:<br>"Quanto consiglieresti la nostra compagnia/prodotto/servizio ad un amico o un collega?"<br>La risposta a questa domanda è basata su una scala da 0 a 10. </span>
                <br>Il questionario <strong>Nasa TLX</strong> consente di valutare il carico di lavoro complessivo che
                l’utente ha percepito durante l’esecuzione di un particolare task. Il questionario viene somministrato
                all’utente dopo il completamento di ogni task dello studio. Il calcolo del carico di lavoro viene
                effettuato utilizzando sei scale differenti: sforzo mentale, sforzo fisico, sforzo temporale,
                prestazioni, fatica e frustrazione. Ognuna di queste scale ha una precisa definizione che l’utente è
                tenuto a leggere attentamente prima di scegliere un valore della scala, altrimenti il risultato del
                questionario potrebbe non essere utile per la valutazione del carico di lavoro per lo specifico task.
                L’intervallo di valori possibili per ogni scala va da 0 a 100 e viene diviso in sotto intervalli di
                cinque punti. Dopo che l’utente ha scelto un valore per ognuna delle sei scale, il questionario viene
                salvato per poter essere successivamente analizzato da parte di chi effettua lo studio di usabilità.
                Quando si salvano le risposte del questionario, viene anche calcolata la media dei valori di tutte le
                scale così che il progettista potrà avere una visione di insieme dei valori relativi a tutte le scale e
                quindi del carico di lavoro complessivo del task.
                <br>L'<strong>Usability Metric for User Experience (UMUX-lite)</strong> è un recente questionario
                alternativo al SUS, composto da due sole affermazioni. È in fase di adattamento e test da parte del
                CognitiveLab dell’Università degli Studi di Perugia.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div style="display: none" id="dataErrorMainInformation" class="alert alert-danger error-message" role="alert"><b>Attenzione!!!</b> Alcuni dati non sono stati inseriti!!</div>
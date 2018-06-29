@if(sizeof($umuxData) > 0)
    <div class="row" style="margin-top: 10px; margin-left: 0px; margin-right: 0px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px;">
            <a id="popoverInfo" class="btn btn-info pull-right" onclick="showDialog()">
                <span class="glyphicon glyphicon-info-sign"/> Info</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-center">Tabella
                    punteggio UMUX-Lite</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-striped" style="margin-top: 40px;">
                    <thead>
                    <tr>
                        <th>Punteggio UMUX-Lite:</th>
                        <th>Deviazione standard:</th>
                        <th>Intervallo di Confidenza 95%:</th>
                        <th>Intervallo di confidenza-limite superiore:</th>
                        <th>Intervallo di confidenza-limite inferiore:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ number_format($umuxData['devUmuxScoreData']['totalumux_score'], 2) }}</td>
                        <td>{{ number_format($umuxData['devUmuxScoreData']['devumux_scoreScore'], 2) }}</td>
                        <td>{{ number_format($umuxData['devUmuxScoreData']['ic'], 2) }}</td>
                        <td>{{ number_format($umuxData['devUmuxScoreData']['upper_ci_bound'], 2) }}</td>
                        <td>{{ number_format($umuxData['devUmuxScoreData']['lower_ci_bound'], 2) }}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modalInfoUmux" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Informazioni sul calcolo dei risultati:</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Calcolo Punteggio UMUX-Lite:</strong><br> Ci sono
						due modi per calcolare i risultati di UMUX. Il primo è il calcolo
						dei valori della scala in modo assoluto, come segue:<br><br><strong>Totale
						assoluto (UMUX-LITE) = {[(Risp. Domanda 1-1)+( Risp. Domanda
						2-1)]* (100/12)}.</strong><br><br> Il secondo processo di calcolo si basa
						sull’idea di bilanciare i punteggi di UMUX-LITE facendoli
						regredire verso i punteggi di un’altra scala di valutazione, il
						SUS, in modo da poterli comparare. <br><br>In questo sistema è stata
						adottata questa formula che si riferisce al totale standardizzato:
                        <br><br><strong>(UMUX-LITE) = 0.65*{[( Risp. Domanda 1-1)+(Risp. Domanda
                            2-1)]* (100/12)} + 22.9.</strong><br><br><strong>Calcolo Deviazione standard: </strong><br>
						La deviazione standard, altro non è che la distribuzione dei
						nostri dati. La formula per calcolarla è: <br><br><strong>σ =
                            radice[(Σ((X-μ)^2))/(N)].</strong>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif

<!------------------------------------------------------------------------------>

<script type="text/javascript">
    function showDialog(){
        $('#modalInfoUmux').modal('toggle');
        $('#modalInfoUmux').show();
    }
</script>
@if(sizeof($nasatlxData) > 0)
    @php
        $tasks = array();

        for($j = 0; $j < sizeof($nasatlxData[0]); $j++){
            array_push($tasks, $nasatlxData[0][$j][$j]);
        }

        $elements = array();

        for($i = 1; $i < sizeof($nasatlxData); $i++){
            array_push($elements, $nasatlxData[$i]);
        }

        $elements = $elements[key($elements)];
    @endphp

    @foreach($tasks as $singleTask)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Obiettivo task: <strong>{{$singleTask['goal']}}</strong> [id = {{$singleTask['id']}}]</h4>
            </div>
            <div class="panel-body">
                <table id="table{{$singleTask['id']}}" class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Sforzo mentale</th>
                        <th>Sforzo fisico</th>
                        <th>Sforzo temporale</th>
                        <th>Prestazioni</th>
                        <th>Fatica</th>
                        <th>Frustrazione</th>
                        <th>Media</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($elements as $value)
                        @if($value['task_id'] == $singleTask['id'])
                            <tr>
                                <td>{{ $value[0] }}</td>
                                <td>{{ $value['r1'] }}</td>
                                <td>{{ $value['r2'] }}</td>
                                <td>{{ $value['r3'] }}</td>
                                <td>{{ $value['r4'] }}</td>
                                <td>{{ $value['r5'] }}</td>
                                <td>{{ $value['r6'] }}</td>
                                <td>{{ ($value['r1'] +
                                        $value['r2'] +
                                        $value['r3'] +
                                        $value['r4'] +
                                        $value['r5'] +
                                        $value['r6']) / 6}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <a id="buttonShowChart{{$singleTask['id']}}" class="btn btn-info" role="button" href="#chart{{$singleTask['id']}}"
                     aria-expanded="false" aria-controls="chart{{$singleTask['id']}}" style="width: 100%"
                     onclick="drawChartUser('buttonShowChart{{$singleTask['id']}}', 'table{{$singleTask['id']}}', 'chart{{$singleTask['id']}}')" >
                    Visualizza Grafico <span class="glyphicon glyphicon-chevron-down" />
                </a>
                <div id="chart{{$singleTask['id']}}" style="width: 100%; display: none"></div>
            </div>
        </div>
    @endforeach
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif

<!-------------------------------------------------------------------------------------->

@if(sizeof($nasatlxData) > 0)
    <script type="text/javascript">

        function drawChartUser(param, tableId, divId) {
            var divDisplay = $('#' + divId);
            var buttonShowChart = $('#' + param);
            var span = buttonShowChart.find("span");

            if (divDisplay.css('display') == 'none') {
                $('#' + divId).show();
                span.addClass('glyphicon-chevron-up');
                span.removeClass('glyphicon-chevron-down');
                google.charts.load('current', {'packages': ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawChart(tableId, divId));
            } else {
                $('#' + divId).hide();
                span.addClass('glyphicon-chevron-down');
                span.removeClass('glyphicon-chevron-up');
            }

        }

        function drawChart(tableID, idDiv) {
            var chartData = new google.visualization.DataTable();

            //colonne della tabella.
            var columns = [["Sforzo mentale"], ["Sforzo fisico"], ["Sforzo temporale"], ["Prestazioni"], ["Fatica"], ["Frustrazione"], ["Media"]];

            //aggiunta al grafico di una colonna che contiene gli username degli utenti.
            chartData.addColumn('string');

            //caricamento dei dati dei grafici utilizzando i dati gia' presenti nelle tabelle della pagina.
            var idTable = "#" + tableID + ' tr';

            $(idTable).each(function () {
                var rowCells = $(this).find('td');

                if (rowCells.length > 0) {
                    //aggiunta del singolo utente al grafico.
                    chartData.addColumn('number', $(rowCells[0]).text());

                    //aggiunta delle risposte dell'utente al grafico.
                    columns.forEach(function (row, index) {
                        row.push(parseFloat($(rowCells[index + 1]).text()));
                    });
                }
            });

            //aggiunta delle colonne della tabella al grafico. Viene utilizzato il metodo addRows dal momento che nei grafici si scambiano le colonne con le righe delle tabelle originarie.
            chartData.addRows(columns);

            var chartOptions = {
                hAxis: {minValue: 0, maxValue: 50, slantedText: true, slantedTextAngle: 45},
                legend: {position: 'top', maxLines: 5},
                vAxis: {title: "Valore"},
                height: 500,
                width: $("#" + idDiv).width(),
                backgroundColor: 'transparent'
            };

            //costruzione e disegno del grafico.
            var chart = new google.visualization.ColumnChart(document.getElementById(idDiv));
            chart.draw(chartData, chartOptions);
        }
    </script>
@endif

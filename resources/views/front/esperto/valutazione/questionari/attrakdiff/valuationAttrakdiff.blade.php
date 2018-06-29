@if(sizeof($attrakdiffData) > 0)
    <div class="row" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
        <div><h3 class="text-center">Diagramma dei valori medi</h3></div>
        <div id="chartAverageValues" style="width: 100%; height: 350px;"></div>
    </div>

    <div class="row" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
        <div>
            <h3 class="text-center">Description of word-pairs</h3>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"
                 style="padding: 0; !important; margin: 0 !important; height: 700px;">
                <div style="height: 25%; width: 100%; background-color: #54fb00;"><img
                            style="margin-top: 70px; width: 100%;" src="{{ URL::asset('assets/images/PQ.png') }}"/>
                </div>
                <div style="height: 25%; width: 100%; background-color: #50caf9;"><img
                            style="padding-top: 70px; width: 100%;" src="{{ URL::asset('assets/images/HQI.png') }}"/>
                </div>
                <div style="height: 25%; width: 100%; background-color: #a580df;"><img
                            style="padding-top: 70px; width: 100%;" src="{{ URL::asset('assets/images/HQS.png') }}"/>
                </div>
                <div style="height: 25%; width: 100%; background-color: #f2f405;"><img
                            style="padding-top: 70px; width: 100%;" src="{{ URL::asset('assets/images/ATT.png') }}"/>
                </div>
            </div>
        </div>

        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="padding: 0 !important;">
            <div id="chartWordPairs" style="width: 100%; height: 700px"></div>
        </div>
    </div>

    <div class="row" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
        <div><h3 class="text-center">Result Diagram</h3></div>
        <div class="text-center">
            @include('front.esperto.valutazione.questionari.attrakdiff.attrakdiffResultDiagram')
        </div>
    </div>
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif

<!-------------------------------------------------------------------------------------->

@if(sizeof($attrakdiffData) > 0)
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChartAverageValues);
        google.charts.setOnLoadCallback(drawChartWordPairs);

        function drawChartAverageValues() {
            hAxis: {
                ticks: [5, 10, 15, 20]
            }
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Values'],
                ['PQ',  {{ $attrakdiffData[1] }}],
                ['HQ-I',  {{ $attrakdiffData[2] }}],
                ['HQ-S',  {{ $attrakdiffData[3] }}],
                ['ATT',  {{ $attrakdiffData[4] }}]
            ]);

            var options = {

                vAxis: {minValue: 0},

                vAxis: {
                    ticks: [-3, -2, -1, 0, 1, 2, 3],
                },
                pointSize: 8,
                colors: ['#f45d1c', '#475825'],
                chartArea: {
                    left: 50,
                    top: 50,
                    right: 50,
                    bottom: 50,
                    width: $('#chartAverageValues').width() - 100,
                    height: $('#chartAverageValues').height() - 100,
                },
                legend: {position: 'top', textStyle: {fontSize: 14}, alignment: 'center'},
                backgroundColor: '#f7f6f4',
            };

            var chart = new google.visualization.LineChart(document.getElementById('chartAverageValues'));

            chart.draw(data, options);
        }

        function drawChartWordPairs() {
            var data = google.visualization.arrayToDataTable([
                ['', 'Values', {role: 'style'}],
                ['human - technical',  {{ $attrakdiffData[0][0] - 4 }}, 'color: #54fb00'],
                ['simple - complicated', {{ $attrakdiffData[0][4] - 4 }}, 'color: #54fb00'],
                ['practical - impractical', {{ $attrakdiffData[0][7] - 4 }}, 'color: #54fb00'],
                ['cumbersome - straightforward', {{ $attrakdiffData[0][9] - 4 }}, 'color: #54fb00'],
                ['predictable - unpredictable', {{ $attrakdiffData[0][11] - 4 }}, 'color: #54fb00'],
                ['confusing - clearly structured', {{ $attrakdiffData[0][19] - 4 }}, 'color: #54fb00'],
                ['unruly - manageable', {{ $attrakdiffData[0][27] - 4 }}, 'color: #54fb00'],

                ['isolating - connective', {{ $attrakdiffData[0][1] - 4 }}, 'color: #50caf9'],
                ['professional - unprofessional', {{ $attrakdiffData[0][5] - 4 }}, 'color: #50caf9'],
                ['stylish - tacky', {{ $attrakdiffData[0][10] - 4 }}, 'color: #50caf9'],
                ['cheap - premium', {{ $attrakdiffData[0][12] - 4 }}, 'color: #50caf9'],
                ['alienanting - integrating', {{ $attrakdiffData[0][13] - 4 }}, 'color: #50caf9'],
                ['brings me closer - separates me', {{ $attrakdiffData[0][14] - 4 }}, 'color: #50caf9'],
                ['unpresentable - presentable', {{ $attrakdiffData[0][15] - 4 }}, 'color: #50caf9'],

                ['inventive - conventional', {{ $attrakdiffData[0][3] - 4 }}, 'color: #a580df'],
                ['unimaginative - creative', {{ $attrakdiffData[0][17] - 4 }}, 'color: #a580df'],
                ['bold - cautious', {{ $attrakdiffData[0][21] - 4 }}, 'color: #a580df'],
                ['innovative - conservative', {{ $attrakdiffData[0][22] - 4 }}, 'color: #a580df'],
                ['dull - captivating', {{ $attrakdiffData[0][23] - 4 }}, 'color: #a580df'],
                ['undemanding - challenging', {{ $attrakdiffData[0][24] - 4 }}, 'color: #a580df'],
                ['novel - ordinary', {{ $attrakdiffData[0][26] - 4 }}, 'color: #a580df'],

                ['pleasant - unpleasant', {{ $attrakdiffData[0][2] - 4 }}, 'color: #f2f405'],
                ['ugly - attractive', {{ $attrakdiffData[0][6] - 4 }}, 'color: #f2f405'],
                ['likeable - disagreeable', {{ $attrakdiffData[0][8] - 4 }}, 'color: #f2f405'],
                ['rejecting - inviting', {{ $attrakdiffData[0][16] - 4 }}, 'color: #f2f405'],
                ['good - bad', {{ $attrakdiffData[0][18] - 4 }}, 'color: #f2f405'],
                ['repelling - appealing', {{ $attrakdiffData[0][20] - 4 }}, 'color: #f2f405'],
                ['motivating - discouraging', {{ $attrakdiffData[0][25] - 4 }}, 'color: #f2f405']
            ]);

            var options = {

                hAxis: {minValue: 0},

                hAxis: {
                    ticks: [-3, -2, -1, 0, 1, 2, 3]
                },
                orientation: 'vertical',
                vAxis: {
                    slantedText: true,
                    slantedTextAngle: 90 // here you can even use 180
                },
                pointSize: 8,
                chartArea: {
                    left: 300,
                    top: 40,
                    right: 10,
                    width: $('#chartWordPairs').width() - 100,
                    height: $('#chartWordPairs').height() - 100,
                    bottom: 25
                },
                legend: {position: 'top', textStyle: {fontSize: 14}, alignment: 'center'},
                backgroundColor: '#f7f6f4',
            };
            var chartWordPairs = new google.visualization.LineChart(document.getElementById('chartWordPairs'));

            chartWordPairs.draw(data, options);
        }
    </script>
@endif

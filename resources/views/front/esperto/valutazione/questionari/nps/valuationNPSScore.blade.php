@if(sizeof($npsData) > 0)
    <div class="row" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
        <div><h3 class="text-center">Tabella punteggio NPS</h3></div>

        <div style="margin-top: 30px;">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <table class="table table-responsive table-striped" style="height: 250px;">
                    <thead></thead>
                    <tbody>
                    <tr>
                        <th>Punteggio NPS:</th>
                        <td align="center">{{ $npsData['valNPS'] }}</td>
                    </tr>
                    <tr>
                        <th>Detrattori(0-6):</th>
                        <td align="center">{{ $npsData['detrattori']*sizeof($npsData['data']).' ('.number_format($npsData['detrattori']*100, 1).'%)' }}</td>
                    </tr>
                    <tr>
                        <th>Neutri(7-8):</th>
                        <td align="center">{{ $npsData['neutri']*sizeof($npsData['data']).' ('.number_format($npsData['neutri']*100, 1).'%)' }}</td>
                    </tr>
                    <tr>
                        <th>Promotori(9-10):</th>
                        <td align="center">{{ $npsData['promotori']*sizeof($npsData['data']).' ('.number_format($npsData['promotori']*100, 1).'%)' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <div id="npsScoreDiv" style="margin: 0 auto; width: 250px; height: 250px;"></div>
            </div>
        </div>


    </div>
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif

<!--------------------------------------------------------------------------------->
@if(sizeof($npsData) > 0)
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawNPSScoreChart);

        function drawNPSScoreChart() {

            var data = new google.visualization.arrayToDataTable([
                ["Label", "Value"],
                ["NPScore", {{ $npsData['valNPS'] }}]
            ]);

            var options = {
                min: -100, max: 100,
                width: 250, height: 250,
                redFrom: -100, redTo: -40,
                yellowFrom: -40, yellowTo: 10,
                greenFrom: 10, greenTo: 100,
                minorTicks: 10
            };

            var chart = new google.visualization.Gauge(document.getElementById("npsScoreDiv"));

            chart.draw(data, options);
        }
    </script>
@endif
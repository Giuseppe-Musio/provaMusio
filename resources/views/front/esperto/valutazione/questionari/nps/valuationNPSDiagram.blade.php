@if(sizeof($npsData) > 0)
    <div class="row" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
        <div style="margin-top: 30px;">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div id="valuationUsers" style="margin: 0 auto; width: 650px; height: 300px;"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 50px;">
                <div id="valuationTypeUsers" style="margin: 0 auto; width: 500px; height: 300px;"></div>
            </div>
        </div>
    </div>
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif

<!--------------------------------------------------------------------------------->

@if(sizeof($npsData) > 0)
    <script type="text/javascript">

        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawNPSTypeUsersChart);
        google.charts.setOnLoadCallback(drawNPSUsersChart);

        function drawNPSTypeUsersChart() {
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Tipo Utente");
            data.addColumn("number", "Valutazione");

            data.addRows([
                ["Promotori",{{ $npsData['promotori'] * sizeof($npsData['data']) }}],
                ["Neutri", {{ $npsData['neutri'] * sizeof($npsData['data']) }}],
                ["Detrattori", {{ $npsData['detrattori'] * sizeof($npsData['data']) }}],
            ]);

            var options = {
                title: "Valutazioni Utenti in Percentuale",
                pieSliceTextStyle: {color: "black"},
                width: 500,
                height: 300,
                slices: [{color: "green"}, {color: "yellow"}, {color: "red"}]
            };

            var chart = new google.visualization.PieChart(document.getElementById("valuationTypeUsers"));
            chart.draw(data, options);
        }

        function drawNPSUsersChart() {

            var data = new google.visualization.DataTable();
            data.addColumn("string", "Utenti");
            data.addColumn("number", "Valutazione");

            data.addRows([
                @foreach($npsData['data'] as $value)
                 ["{{$value[0]}}", {{$value['r1']}} ],
                @endforeach
            ]);

            var options = {
                title: "Valutazioni Fornite dagli Utenti",
                width: 650,
                height: 300,
                hAxis: {
                    title: "Valutazione",
                    minValue: 0,
                    ticks: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                },
                vAxis: {
                    title: "",
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById("valuationUsers"));
            chart.draw(data, options);
        }
    </script>
@endif
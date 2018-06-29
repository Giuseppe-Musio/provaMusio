@if(sizeof($susData) > 0)
    <div class="row" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
        <div class="text-center"><h3>Grafico a Barre - Punteggio SUS Partecipanti</h3></div>
        <div id="susGraphicDetailUsersValues"></div>
    </div>
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif

<!--------------------------------------------------------------------------------->

@if(sizeof($susData) > 0)
    <script type="text/javascript">
        google.charts.load("current", {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawSUShistogramChart);

        function drawSUShistogramChart() {

            var elements = [["User", "SusScore", {role: "style"}]];

            @foreach($susData['data'] as $value){
                var temp = [];

                temp.push("{{ $value['email'] }}");
                temp.push({{ $value['sus_score'] }});
                temp.push("color: #76A7FA");
                elements.push(temp);
            }
            @endforeach

            var data = google.visualization.arrayToDataTable(elements);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
                2
            ]);

            var options = {
                width: $('#valuationTitle').width(),
                height: 500,
                bar: { groupWidth: "95%" },
                legend: { position: "none" },
                hAxis: {slantedText: true, slantedTextAngle: 30},
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("susGraphicDetailUsersValues"));
            chart.draw(view, options);
        }
    </script>
@endif

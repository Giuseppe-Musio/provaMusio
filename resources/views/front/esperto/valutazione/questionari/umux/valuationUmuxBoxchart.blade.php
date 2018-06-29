@if(sizeof($umuxData) > 0)
    @if(sizeof($umuxData['data']) >= 7)
        <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="text-center"><h3 align="center">UMUX Box Plot</h3></div>
            <div id="UMUXBoxPlot" style="height: 100%;"></div>
        </div>

        <script type="text/javascript" src="{{ URL::asset('assets/js/plugin/boxPlotUtility.js') }}"></script>
    @else
        @include('front.esperto.valutazione.questionari.noDataEnough')
    @endif
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif

<!------------------------------------------------------------------------>
@if(sizeof($umuxData) > 0)
    @if(sizeof($umuxData['data']) >= 7)
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawSUSBoxPlot);

            function drawSUSBoxPlot() {

                var array = [];

                var temp = [];
                temp.push("Punteggio UMUX");

                @foreach($umuxData['data'] as $value)
                temp.push(parseInt({{ $value['umux_score'] }}));
                @endforeach

                array.push(temp);

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'x');
                data.addColumn('number', 'series0');
                data.addColumn('number', 'series1');
                data.addColumn('number', 'series2');
                data.addColumn('number', 'series3');
                data.addColumn('number', 'series4');
                data.addColumn('number', 'series5');
                data.addColumn('number', 'series6');

                data.addColumn({id: 'max', type: 'number', role: 'interval'});
                data.addColumn({id: 'min', type: 'number', role: 'interval'});
                data.addColumn({id: 'firstQuartile', type: 'number', role: 'interval'});
                data.addColumn({id: 'median', type: 'number', role: 'interval'});
                data.addColumn({id: 'thirdQuartile', type: 'number', role: 'interval'});

                data.addRows(getBoxPlotValues(array));

                var options = {
                    width: $('#valuationTitle').width(),
                    height: 500,
                    legend: {position: 'none'},
                    hAxis: {
                        gridlines: {color: '#FFF'},
                    },
                    lineWidth: 0,
                    series: [{'color': '#D6332D'}],
                    intervals: {
                        barWidth: 1,
                        boxWidth: 1,
                        lineWidth: 2,
                        style: 'boxes'
                    },
                    interval: {
                        max: {
                            style: 'bars',
                            fillOpacity: 1,
                            color: '#555'
                        },
                        min: {
                            style: 'bars',
                            fillOpacity: 1,
                            color: '#757'
                        }
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('UMUXBoxPlot'));
                chart.draw(data, options);
            }
        </script>
    @endif
@endif
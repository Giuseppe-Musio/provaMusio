@if(sizeof($susData) > 0)
    <div class="row" style="margin-top: 30px; margin-left: 0px; margin-right: 0px;">
        <div>
            <h3 class="text-center">SUS - Apprendibilità</h3>
            <table class="table table-striped" style="margin-top: 30px;">
                <thead>
                <tr>
                    <th>SUS - Apprendibilità:</th>
                    <th>Deviazione standard:</th>
                    <th>Intervallo di Confidenza 95%:</th>
                    <th>Intervallo di confidenza-limite superiore:</th>
                    <th>Intervallo di confidenza-limite inferiore:</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ number_format($susData['devLearnabilityData']['totallearnability'], 2) }}</td>
                    <td>{{ number_format($susData['devLearnabilityData']['devlearnabilityScore'], 2) }}</td>
                    <td>{{ number_format($susData['devLearnabilityData']['ic'], 2) }}</td>
                    <td>{{ number_format($susData['devLearnabilityData']['upper_ci_bound'], 2) }}</td>
                    <td>{{ number_format($susData['devLearnabilityData']['lower_ci_bound'], 2) }}</td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="col-sm-2 col-xs-1"></div>
    </div>
@else
    @include('front.esperto.valutazione.questionari.noDataFound')
@endif
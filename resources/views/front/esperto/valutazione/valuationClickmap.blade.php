@include ('front.esperto.valutazione.valuationMenu')

<div class="row" style="margin-top: 30px;">
    <div class="col-md-12">
        {{ $tasks->appends(request()->input())->links() }}
        <div class="panel panel-default">
            <div class="panel-heading">Task</div>
            <div class="panel-body">
                @php $i=0; @endphp
                @forelse($tasks as $value)
                    @if($i==0)
                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>Obiettivo</th>
                                <th>Url Principale</th>
                                <th></th>
                            </tr>
                            </thead>
                            @endif
                            <tr>
                                <td>{{$value->goal}}</td>
                                <td>{{$value->start_url}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary" id="buttonClickmap{{$i}}">
                                        Visualizza Clickmap
                                    </a>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @empty
                                <h3>Non hai creato nessuno studio!</h3>
                            @endforelse
                        </table>
            </div>
        </div>
        {{ $tasks->appends(request()->input())->links() }}
    </div>
</div>

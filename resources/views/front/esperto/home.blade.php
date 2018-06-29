@extends('front.master')

@section('content')
    <div class="row">
        <form id="studioForm" class="form-horizontal" method="GET">
            {{ csrf_field() }}
            <div class="col-md-8 col-md-offset-2">
                {{ $data->links() }}
                <div class="panel panel-default">
                    <div class="panel-heading">Studi Creati</div>
                    <div class="panel-body">
                        @php $i=0; @endphp
                        @forelse($data as $value)
                            @if($i==0)
                                <table class="table table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th>Titolo</th>
                                        <th>Descrizione</th>
                                        <th>URL</th>
                                        <th>Data</th>
                                        <th>Valuta</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    @endif
                                    <tr>
                                        <td>{{$value->goal}}</td>
                                        <td>{{$value->description}}</td>
                                        <td>{{$value->url}}</td>
                                        <td>{{$value->data_creation}}</td>
                                        <td>
                                            <ul class="nav nav-pills">
                                                <li role="presentation" class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button"
                                                            id="dropDownOptionMenu{{$i}}" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="true">
                                                        Scegli una Opzione
                                                        <span class="caret" />
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropDownOptionMenu{{$i}}">
                                                        <li>
                                                            <a href="{{ route('valutazione.audio', ['study' => $value->id, 'user' => $value->user_id]) }}">Audio</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('valutazione.video', ['study' => $value->id, 'user' => $value->user_id]) }}">Video</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('valutazione.mouseActivity', ['study' => $value->id, 'user' => $value->user_id]) }}">Attività
                                                                del mouse</a></li>
                                                        <li>
                                                            <a href="{{ route('valutazione.heatmap', ['study' => $value->id, 'user' => $value->user_id]) }}">Heatmap</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('valutazione.clickmap', ['study' => $value->id, 'user' => $value->user_id]) }}">Clickmap</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('valutazione.questionary', ['study' => $value->id, 'user' => $value->user_id]) }}">Questionari</a>
                                                        </li>
                                                        <li><a onclick="showSuccessTask('{{ route('valutazione.tasksSuccess', ['study' => $value->id, 'user' => $value->user_id]) }}', '{{ $value->id }}', '{{ $value->user_id }}')" style="cursor: pointer;">Tasso di successo dei Task</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('esperto.joinTesterToStudy', ['study' => $value->id, 'user' => $value->user_id]) }}"
                                               class="btn btn-primary" id="buttonTesterInvite{{$i}}">
                                                Invita Partecipanti
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
                {{ $data->links() }}
            </div>
        </form>
    </div>

    <!----------------------------------------------------------------------------------------------->

    <!-- Modal Tasso di successo dei Task-->
    <div id="modal_successo_task" class="modal fade" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×</button>
                    <h4 class="modal-title">
                        Tasso di successo dei Task
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="modal-loader" style="display: none; text-align: center;">
                        <!-- ajax loader -->
                        <img src="{{ URL::asset('assets/images/ajax-loader.gif') }}">
                    </div>

                    <!-- mysql data will be load here -->
                    <div id="dynamic-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('assets/js/plugin/dropdown.js') }}"></script>
@endsection

@section('navbar')
    @include('front.navbar')
@endsection
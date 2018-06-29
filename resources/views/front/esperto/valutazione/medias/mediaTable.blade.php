@if(sizeof($medias) > 0)
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-12">
            {{ $medias->appends(request()->input())->links() }}
            <div class="panel panel-default">
                <div class="panel-body">
                    @php $i=0; @endphp
                    @forelse($medias as $media)
                        @if($i==0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>Utente</th>
                                    <th>Email</th>
                                    <th>Obiettivo Task</th>
                                    <th>Data Completamento</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @endif
                                <tr>
                                    <td>{{$media->studyUser->user->name}}</td>
                                    <td>{{$media->studyUser->user->email}}</td>
                                    <td>{{$media->task->goal}}</td>
                                    <td>$media->studyUser->studyUserTask->first()->created_at->toDateTimeString()}}</td>

                                    @if($media->type == 'video/webm')
                                        <td>
                                            <a id="buttonMedia{{$i}}" class="btn btn-primary" name="{{ $media->path }}"
                                               onclick="showMedia(this, '{{ URL::asset('assets/js/plugin/video/video-js.js') }}', '{{ $media->type }}' )">
                                                Riproduci {{ $button_name }}
                                            </a>
                                        </td>
                                    @elseif($media->type == 'audio/ogg')
                                        <td>
                                            <a id="buttonMedia{{$i}}" class="btn btn-primary" name="{{ $media->path }}"
                                               onclick="showMedia(this, '{{ URL::asset('assets/js/plugin/audio/audio.js') }}', '{{ $media->type }}' )">
                                                {{ $button_name }}
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                                @php $i++; @endphp
                                @empty

                                @endforelse
                            </table>
                </div>
            </div>
            {{ $medias->appends(request()->input())->links() }}
        </div>
    </div>
@else
    @include('front.esperto.valutazione.medias.noMediaFound', ['mediaName' => $button_name])
@endif
@if(sizeof($medias) > 0)
<style> 
.mediaaaa
{
visibility: hidden;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
}


</style>
</style>
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
                                    <th>Video</th>
                                </tr>
                                </thead>
                                @endif
                                <tr>
                                    <td>{{$media->studyUser->user->name}}</td>
                                    <td>{{$media->studyUser->user->email}}</td>
                                    <td>{{$media->task->goal}}</td>
                                    <td>$media->studyUser->studyUserTask->first()->created_at->toDateTimeString()}}</td>

                                    <td>
                                        <button class="btn btn-primary" onclick="playVid({{$i}})" type="button">Riproduci Video</button>

                                    </td>

                                    
                                @if($media->type == 'video/webm')
                                
                                        
                                     <video class='mediaaaa' id='{{$i}}' width = "620" height = "400" controls preload="none" > 

                                       
                                               <source src = "{{asset("storage/video/$media->file_name")}}" 
                                                type="video/webm">
  
                                            
                                        </video>
                                        
                                    @elseif($media->type == 'audio/ogg')
                                        
                                          
                                     <video class='mediaaaa' id='{{$i}}' width="620" height = "400" controls preload="none" > 

                                       
                                               <source src = "{{asset("storage/audio/$media->file_name")}}" 
                                                type="video/webm">
  
                                            
                                        </video>
                                        
                                    @endif 
                                   
                                </tr>

                                <script>
                                        function playVid(num) { 
                                        var vid=document.getElementById(num);
                                        vid.style.visibility="visible";

                                         if (vid.paused){ 
                                            vid.play();
                                        }
                                              vid.onended = function() {
                                                vid.style.visibility="hidden";
                                          };
                                        
                                    } 
                                </script> 

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

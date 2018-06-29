@extends('front.master')

@section('content')

    <h2>Task {{$task}}</h2>
    @if($task->study->flag_video == 1)
        <video id="media" hidden></video>
    @elseif ($task->study->flag_audio == 1)
        <audio id="media" hidden></audio>
    @endif

    <iframe id="iframe_id" class="embed-responsive-item" src="{{$task->start_url}}" allowfullscreen="allowfullscreen" sandbox
            style="height: 100%; left: 0px; position: absolute; top: 0px; width: 100%"></iframe>

    <div id="modalPresentazioneTask" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">Titolo compito: {{$task->goal}} </h4>
                </div>
                <div class="modal-body">
                    <b>Istruzioni compito</b>
                    <p>{{$task->instruction}}</p>
                </div>
                <div class="modal-footer">
                    <button onclick="recordingMedia('{{$task->study->flag_video}}','{{$task->study->flag_audio}}')"
                            type="button" class="btn btn-default" data-dismiss="modal">ok
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Messaggio Fine Tempo Massimo-->
    <div id="modalMessaggioTempoMassimo" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">Tempo massimo raggiunto</h4>
                </div>
                <div class="modal-body">
				<span>Il task è terminato per tempo massimo raggiunto. Premere "Ok"
					per andare avanti.</span>
                </div>
                <div class="modal-footer">
                    <form action="{{route('partecipante.studio.nextjob', ['idstudio' => $task->study_id])}}"
                          id="terminaTask" method="get">
                        <div class="col-xs-12">
                            <button id="save" type="button" class="btn btn-default"
                                    data-dismiss="modal">Ok
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{URL::asset('assets/js/RecordRTC.js')}}"></script>
    <script src="{{URL::asset('assets/js/adapter-latest.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#modalPresentazioneTask').modal();
        })

        function recordingMedia(flagVideoParam, flagAudioParam) {

            var flagVideo = parseInt(flagVideoParam);
            var flagAudio = parseInt(flagAudioParam);

            var timeTask;
            var interval;
            display = $('#time');
            startTimer('{{$task->time_max}}', display);

            options = (flagVideo === 0) ? {
                video: false,
                audio: true
            } : {video: true, audio: true};

            console.log("[DEBUG] options value variable: " + JSON.stringify(options));
            console.log("[DEBUG] flagVideo e flagAudio values variables: " + flagVideo + "	" + flagAudio);

            if (flagVideo === 1 || flagAudio === 1) {
                var recorder;
                navigator.mediaDevices.getUserMedia(options).then(function (camera) {
                    // preview camera during recording

                    setSrcObject(camera, document.getElementById('media'));
                    // recording configuration/hints/parameters
                    var recordingHints = {
                        type: 'video'
                    };

                    if (flagVideo === 0) {
                        var recordingHints = {
                            type: 'audio',
                            numberOfAudioChannels: 2,
                            checkForInactiveTracks: true,
                            bufferSize: 16384,
                            sampleRate: 48000
                        };
                        camera.muted = true;
                    }
                    console.log("[DEBUG] recordingHints value variable: " + JSON.stringify(recordingHints));
                    // initiating the recorder
                    recorder = RecordRTC(camera, recordingHints);
                    // starting recording here
                    recorder.startRecording();


                });

            }


            function stopRec() {
//	if(recorder == null)
//		return;

                recorder.stopRecording(function () {
                    console.log("record stop");
                    // get recorded blob
                    var blob = recorder.getBlob();

                    var ext = 'webm';
                    var mimetype = 'video/webm';

                    if (flagVideo === 0) {
                        mimetype = 'audio/ogg';
                        ext = 'ogg';
                    }

                    console.log(mimetype);
                    // generating a random file name
                    var fileName = getFileName(ext);
                    // we need to upload "File" --- not "Blob"
                    var fileObject = new File([blob], fileName, {
                        type: mimetype
                    });
                    var formData = new FormData();
                    // recorded data
                    formData.append('blob', fileObject);
                    // file name
                    formData.append('filename', fileObject.name);
                    formData.append('mimetype', mimetype);

                    // upload using jQuery
                    $.ajax({
                        url: '{{route('partecipante.studio.media.upload', ['idstudio' => $task->study_id, 'task' => $task->id])}}', // replace with your own server URL
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (response) {
                            if (response.status === 'success') {
                                console.log('successfully uploaded recorded blob');

                            } else {
                                console.log("Success failed upload: " + response); // error/failure
                            }
                        },
                        error: function (response) {
                            console.log("Error upload: " + response);
                        }
                    });
                    // release camera
                    console.log("Erase media tag");
                    document.getElementById('media').srcObject = document.getElementById('media').src = null;
                    //	camera.getTracks().forEach(function(track) {
                    //		track.stop();
                    //	});

                    //	var formDataSave = new FormData();

                    //	formDataSave.append('end_time', timeTask );
                    //	formDataSave.append('start_time', '{{$task->time_max}}');
                    //	var url = document.getElementById("iframe_id").contentWindow.location.href;
                    //	formDataSave.append('end_url', url);
                    //	formDataSave.append('start_url','{{$task->start_url}}');


                });
            }

            function savetask() {
                var url = document.getElementById("iframe_id").contentWindow.location.href;
                console.log("Start save task");
                //	console.log("Form save task: " + JSON.stringify(formDataSave));
                var form = {
                    end_time: timeTask,
                    start_time: parseInt('{{$task->time_max}}'),
                    end_url: url,
                    start_url: '{{$task->end_url}}'
                };


                console.log("form: " + JSON.stringify(form));
                $.ajax({
                    url: '{{route('partecipante.studio.save.task', ['idstudio' => $task->study_id, 'task' => $task->id])}}', // replace with your own server URL
                    data: {
                        end_time: timeTask,
                        start_time: parseInt('{{$task->time_max}}'),
                        end_url: url,
                        start_url: '{{$task->start_url}}'
                    },
                    type: 'POST',
                    //	contentType: false,
                    //	processData: false,
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (response) {
                        if (response.status === 'success') {
                            console.log(response.msg);

                        } else {
                            console.log("Success failed save task: " + response); // error/failure
                        }
                    },
                    error: function (response) {
                        console.log("Error save task: " + response);
                    }
                });
            }

//	}
            $('#stopandsave').delay(2000).click(function () {
                clearInterval(interval);

                if ((flagVideo === 1) || (flagAudio === 1))
                {
                    stopRec();
                }
                console.log("savetask inizio");
                savetask();
                console.log("savetask fine");
            })


            $('#save').click(function () {

                alert('sono qua');

                if ((flagVideo === 1) || (flagAudio === 1))
                {
                    stopRec();
                }
                savetask();
                setTimeout(function () {
                    $('#terminaTask').submit()
                }, 2000);
            })

            function startTimer(durationParam, display) {

                var duration = parseInt(durationParam) * 60;

                var timer = duration, minutes, seconds;
                interval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10)
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.text(minutes + ":" + seconds);
                    --timer;
                    timeTask = timer;
                    if (timer < 0) {
                        //	timer = duration;
                        clearInterval(interval);
                        $('#modalMessaggioTempoMassimo').modal();
                    }
                }, 1000);
            }
        }


        // this function is used to generate random file name
        function getFileName(fileExtension) {
            var d = new Date();
            var year = d.getUTCFullYear();
            var month = d.getUTCMonth() + 1;
            var date = d.getUTCDate();
            return 'RecordRTC-' + year + month + date + '-' + 'study-' + '{{$task->study->id}}' + '_task-' + '{{$task->id}}' + '_user-' + '{{Auth::id()}}' + '.' + fileExtension;
        }

    </script>

@endsection


@section('navbar')

    @include('front.partecipante.studio.navbar')

@endsection
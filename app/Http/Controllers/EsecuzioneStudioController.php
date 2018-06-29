<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;
use App\Models\Study;
use App\Models\Media;
use App\Models\StudyUser;
use App\Models\StudyUserTask;

use App\Models\AttrakdiffQuestionary;
use App\Models\NasatlxQuestionary;
use App\Models\NpsQuestionary;
use App\Models\SusQuestionary;
use App\Models\UmuxQuestionary;
use Illuminate\Support\Facades\Storage;


class EsecuzioneStudioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($idstudio)
    {
        $studio = Study::find($idstudio);
        $tasks = Task::where('study_id', $idstudio)->orderBy('id', 'desc')->with('study')->get();
        $queue = collect();

        if ($studio->flag_assessment_aa)
            $queue->push(['questionario' => 'aa']);

        if ($studio->flag_assessment_sus)
            $queue->push(['questionario' => 'sus']);

        if ($studio->flag_assessment_nps)
            $queue->push(['questionario' => 'nps']);

        if ($studio->flag_assessment_umux)
            $queue->push(['questionario' => 'umux']);

        foreach ($tasks as $task) {
            if ($studio->flag_assessment_nasatlx)
                $queue->push(['questionario' => 'nasatlx', 'task' => $task->id]);

            $queue->push(['task' => $task]);
        }

        $studyuser = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        $studyuser->flag_complete = 1;
        $studyuser->save();

        session()->put('queue_job', $queue);
        session()->put('id_studio_execute', $idstudio);

        return view('front.partecipante.studio.info');
    }


    public function nextjob($idstudio)
    {
        if ($idstudio != session()->get('id_studio_execute'))
            return redirect()->route('partecipante.home');


        $jobs = session()->get('queue_job');

        if ($jobs->isEmpty()) {
//            \app\Models\StudyUser::where('user_id', Auth::id())->where('study_id', session()->get('id_studio_execute'))->update(['flag_complete' => 1]);
            return redirect()->route('partecipante.home');
        }


        $job = $jobs->pop();
        session()->put('queue_job', $jobs);

        if (key($job) == 'task') {
            $task = $job['task'];
            return view('front.partecipante.studio.task', compact('task'));
        }

        if (key($job) == 'questionario') {
            $questionario = $job['questionario'];

            if ($questionario == 'nasatlx')
                return redirect()->route('partecipante.studio.questionario.nasaltx.index', ['idstudio' => session()->get('id_studio_execute'), 'idtask' => $job['task']]);

            if ($questionario == 'aa')
                return redirect()->route('partecipante.studio.questionario.aa.index', ['idstudio' => session()->get('id_studio_execute')]);

            if ($questionario == 'nps')
                return redirect()->route('partecipante.studio.questionario.nps.index', ['idstudio' => session()->get('id_studio_execute')]);

            if ($questionario == 'sus')
                return redirect()->route('partecipante.studio.questionario.sus.index', ['idstudio' => session()->get('id_studio_execute')]);

            if ($questionario == 'umux')
                return redirect()->route('partecipante.studio.questionario.umux.index', ['idstudio' => session()->get('id_studio_execute')]);
        }

    }

    public function media(Request $request, $idstudio, $task)
    {
        //  $file = $request->file('blob');
        //  $mimeAllowed = ["video/webm" => "video", "audio/ogg" => "audio"];
        $mimesplit = explode("/", $request->mimetype);

        $path = storage_path($mimesplit[0]); //public_path('uploads'). <- esprime l'indirizzo assoluto

        $url_path = $request->file('blob')->storeAs($mimesplit[0], $request->filename);//move($path, $request->filename);

        $media = new Media();

        /////////////////////////////////////////////////////////////
        //////////////A SITO OFFLINE INSERIRE QUESTO//////////////////
        $base_url = url('/');
        $base_url = substr($base_url, 0, strlen($base_url) - 7);
        $base_url = $base_url."/storage/app/public/";
        $media->path = $base_url.$url_path;
        /////////////////////////////////////////////////////////////

        /////////////////////////////////////////////////////////////
        //////////////A SITO ONLINE INSERIRE QUESTO//////////////////
        //$media->path = Storage::url($url_path);
        /////////////////////////////////////////////////////////////

        $media->type = $request->mimetype;
        $media->file_name = $request->filename;
        //  $mimesplit = explode("/", $request->mimetype);
        $media->extension = $mimesplit[1];
        $media->task_id = $task;
        $studyuser = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        $media->studyUser()->associate($studyuser);
        $media->save();
        // Storage::putFile(public_path('uploads'), new File($request->file('blob')));
        $response = array('status' => 'success', 'msg' => 'upload file completed');
        return response()->json($response);//$mimeAllowed[$file->getMimeType()];
    }

    public function savetask($idstudio, $task, Request $request)
    {
        $end_time = intval($request->end_time);
        $start_time = intval($request->start_time);
        $start_url = $request->start_url;
        $end_url = $request->end_url;
        $note = "";
        $result = 0;

        if (strcmp($start_url, $end_url) == 0) {
            $note = "task concluso con successo nel tempo stabilito.";

            if ($end_time == ($start_time * 60)) {
                $note = "task concluso con successo esaurendo il tempo stabilito";
            }

            $result = 1;
        } else {
            $note = "L\'utente non ha superato il task";
            $result = 0;
        }

        $studyUserTask = new StudyUserTask();

        $studyUserTask->result = $result;
        $studyUserTask->note = $note;
        $studyUserTask->task_id = $task;

        $studyuser = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        /*$studyuser->flag_complete = 1;
        $studyuser->save();*/

        $studyUserTask->studyUser()->associate($studyuser);

        $studyUserTask->save();
        $response = array('status' => 'success', 'msg' => $studyUserTask);
        return response()->json($response);
        //      $response = array('status' => 'success', 'msg' => $result);
        //      return response()->json($response);
    }

    public function interrompi($idstudio)
    {
        $studyuser = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        $studyuser->flag_complete = 0;
        $studyuser->save();

        $studyusertask = StudyUserTask::where('study_user_id', $studyuser->id)->delete();

        $nasatlx = NasatlxQuestionary::where('study_user_id', $studyuser->id)->delete();
        $attrakdiff = AttrakdiffQuestionary::where('study_user_id', $studyuser->id)->delete();
        $nps = NpsQuestionary::where('study_user_id', $studyuser->id)->delete();
        $sus = SusQuestionary::where('study_user_id', $studyuser->id)->delete();
        $umux = UmuxQuestionary::where('study_user_id', $studyuser->id)->delete();

        $media = Media::where('study_user_id', $studyuser->id)->delete();

        return redirect()->route('partecipante.home');
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: andreese
 * Date: 22/01/2018
 * Time: 10:45
 */

namespace App\Http\Controllers;

use App\Http\Controllers\ControllersHelper\QuestionaryHelper;
use App\Models\Media;
use App\Models\Study;
use App\Models\StudyUser;
use App\Models\StudyUserTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ValuationController extends Controller
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

    public function audio(Request $request)
    {
        if ($request->input('user') == Auth::user()->getAuthIdentifier() &&
            sizeof(Study::where('id', $request->input('study'))->get(['user_id'])->toArray()) != 0) {
            $array = Study::all()->where('id', $request->input('study'))->toArray();

            $audios = Media::where('type', 'audio/ogg')
                ->join('study_user', 'medias.study_user_id', '=', 'study_user.id')
                ->where('study_user.study_id', $request->input('study'))
                ->with('studyUser.user', 'studyUser.studyUserTask', 'task')
                ->paginate(10);

            return view('front.esperto.valutazione.valuation',
                ['study' => $request->input('study'),
                    'user' => $request->input('user'),
                    "title" => "Audio",
                    "audios" => $audios,
                    "array" => $array]);
        } else {
            return $this->goToHome();
        }
    }

    public function video(Request $request)
    {
        if ($request->input('user') == Auth::user()->getAuthIdentifier() &&
            sizeof(Study::where('id', $request->input('study'))->get(['user_id'])->toArray()) != 0) {
            $array = Study::all()->where('id', $request->input('study'))->toArray();

            $videos = Media::where('type', 'video/webm')
                ->join('study_user', 'medias.study_user_id', '=', 'study_user.id')
                ->where('study_user.study_id', $request->input('study'))
                ->with('studyUser.user', 'studyUser.studyUserTask', 'task')
                ->paginate(10);

            return view('front.esperto.valutazione.valuation',
                ['study' => $request->input('study'),
                    'user' => $request->input('user'),
                    "title" => "Video",
                    "videos" => $videos,
                    "array" => $array]);
        } else {
            return $this->goToHome();
        }
    }

    public function mouseActivity(Request $request)
    {
        if ($request->input('user') == Auth::user()->getAuthIdentifier() &&
            sizeof(Study::where('id', $request->input('study'))->get(['user_id'])->toArray()) != 0) {
            $array = Study::all()->where('id', $request->input('study'))->toArray();
            return view('front.esperto.valutazione.valuation', ['study' => $request->input('study'), 'user' => $request->input('user'), "title" => "Attività Mouse", "array" => $array]);
        } else {
            return $this->goToHome();
        }
    }

    public function heatmap(Request $request)
    {
        if ($request->input('user') == Auth::user()->getAuthIdentifier() &&
            sizeof(Study::where('id', $request->input('study'))->get(['user_id'])->toArray()) != 0) {
            $array = Study::all()->where('id', $request->input('study'))->toArray();
            return view('front.esperto.valutazione.valuation', ['study' => $request->input('study'), 'user' => $request->input('user'), "title" => "Heatmap", "array" => $array]);
        } else {
            return $this->goToHome();
        }
    }

    public function clickmap(Request $request)
    {
        if ($request->input('user') == Auth::user()->getAuthIdentifier() &&
            sizeof(Study::where('id', $request->input('study'))->get(['user_id'])->toArray()) != 0){
            $array = Study::all()->where('id', $request->input('study'))->toArray();
            $tasks = Task::where('study_id', $request->input('study'))->paginate(10);
            return view('front.esperto.valutazione.valuation',
                ['study' => $request->input('study'),
                    'user' => $request->input('user'),
                    "title" => "Clickmap",
                    "array" => $array,
                    "tasks" => $tasks
                ]);
        } else {
            return $this->goToHome();
        }
    }

    public function questionary(Request $request)
    {
        if ($request->input('user') == Auth::user()->getAuthIdentifier() &&
            sizeof(Study::where('id', $request->input('study'))->get(['user_id'])->toArray()) != 0) {
            $study_id = $request->input('study');
            $array = Study::all()->where('id', $study_id)->toArray();

            $studyUser = StudyUser::all()->where('study_id', $study_id)->toArray();
            $studyUserTask = StudyUserTask::join('study_user', 'study_user_task.study_user_id', '=', 'study_user.id')
                ->where('study_user.study_id', $study_id)
                ->get()
                ->toArray();

            $attrakdiffData = QuestionaryHelper::getAttrakdiffData($studyUser);
            $nasatlxData = QuestionaryHelper::getNasatlxData($studyUserTask);
            $npsData = QuestionaryHelper::getNPSData($studyUser);
            $susData = QuestionaryHelper::getSUSData($studyUser);
            $umuxData = QuestionaryHelper::getUmuxData($studyUser);

            return view('front.esperto.valutazione.valuation',
                ['study' => $request->input('study'),
                    'user' => $request->input('user'),
                    "title" => "Questionari",
                    "array" => $array,
                    "attrakdiffData" => $attrakdiffData,
                    "nasatlxData" => $nasatlxData,
                    "npsData" => $npsData,
                    "susData" => $susData,
                    "umuxData" => $umuxData,
                ]);
        } else {
            return $this->goToHome();
        }
    }

    public function tasksSuccess(Request $request){
        if ($request->input('user') == Auth::user()->getAuthIdentifier() &&
            sizeof(Study::where('id', $request->input('study'))->get(['user_id'])->toArray()) != 0){

            $studyUser = StudyUser::where('study_id', $request->input('study'))
                ->with('user', 'studyUserTask', 'studyUserTask.task')
                ->get();
            $tasks = Task::where('study_id', $request->input('study'))
                ->get();

            $result = array();
            $temp = array();
            $temp2 = array();

            $temp[0] = "";
            $i = 1;

            foreach ($tasks as $tuple){
                $temp[$i] = $tuple->goal;
                $i++;
            }

            $temp[$i] = "Tasso di successo medio per partecipante";

            $temp2[0] = "Tasso di successo medio per task";
            array_push($result, $temp);

            foreach($studyUser as $tuple){
                $temp = array();
                $sumTesterResult = 0;

                $temp[0] = $tuple->user->email;

                $j = 1;
                foreach ($tasks as $singleTask){
                    if($tuple->studyUserTask->first() != null){
                        if($tuple->studyUserTask->first()->task->id == $singleTask->id){
                            $temp[$j] = 'completato';
                            $sumTesterResult++;
                            if(isset($temp2[$j]))
                                $temp2[$j] = $temp2[$j] + 1;
                            else
                                $temp2[$j] = 1;
                        }
                    }else{
                        $temp[$j] = 'non eseguito';
                        if(!isset($temp2[$j]))
                            $temp2[$j] = 0;
                    }
                    $j++;
                }

                $averageTester = round(($sumTesterResult / sizeof($tasks)) * 100, 2);

                $temp[$j] = $averageTester;
                array_push($result, $temp);
            }

            $temp2[$i] = "";

            for($k = 1; $k <= sizeof($tasks); $k++){
                $temp2[$k] = round(($temp2[$k] / sizeof($studyUser)) * 100, 2);
            }

            array_push($result, $temp2);

            return $result;
        }else{
            return array();
        }
    }
}
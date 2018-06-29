<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\NasatlxQuestionary;
use App\Models\Task;
use App\Models\StudyUser;

class NasatlxController extends Controller
{
    public function index($idtask)
    {
        return view('front.partecipante.studio.questionari.nasatlx', ['idtask' => $idtask]);
    }

    public function store($idstudio, $idtask, Request $request )
    {
        $questionario = new NasatlxQuestionary();

        $questionario->r1 = $request->mentalDemand;
        $questionario->r2 = $request->physicalDemand;
        $questionario->r3 = $request->temporalDemand;
        $questionario->r4 = $request->performance;
        $questionario->r5 = $request->effort;
        $questionario->r6 = $request->frustration;

       $task = Task::where('id',$idtask)->first();
        $questionario->task()->associate($task);

        $studyUser = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        $questionario->studyUser()->associate($studyUser);

        $questionario->save();
        $response = array('status' => 'success', 'msg' => 'upload questionary completed: '.$questionario);
        return response()->json($response);
    }
}

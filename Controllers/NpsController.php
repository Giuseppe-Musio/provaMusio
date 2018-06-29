<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NpsQuestionary;
use App\Models\StudyUser;

class NpsController extends Controller
{
    public function index()
    {
        return view('front.partecipante.studio.questionari.nps');
    }

    public function store($idstudio, Request $request)
    {
        $questionario = new NpsQuestionary();

        $questionario->r1 = $request->value;

        $studyUser = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        $questionario->studyUser()->associate($studyUser);

        $questionario->save();
        $response = array('status' => 'success', 'msg' => 'upload questionary completed: '.$questionario);
        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UmuxQuestionary;
use App\Models\StudyUser;


class UmuxController extends Controller
{
    public function index()
    {
        return view('front.partecipante.studio.questionari.umux');
    }

    public function store($idstudio, Request $request)
    {
        $questionario = new UmuxQuestionary();

        $questionario->r1 = $request->Item1;
        $questionario->r2 = $request->Item2;
        
        $studio_eseguito = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        $questionario->studyUser()->associate($studio_eseguito);

        $questionario->save();
        $response = array('status' => 'success', 'msg' => 'upload questionary completed: '.$questionario);
        return response()->json($response);
    }
}

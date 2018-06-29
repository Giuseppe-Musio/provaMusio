<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SusQuestionary;
use App\Models\StudyUser;

class SusController extends Controller
{
    public function index()
    {
        return view('front.partecipante.studio.questionari.sus');
    }

    public function store(Request $request, $idstudio)
    {
        $questionario = new SusQuestionary();

        $questionario->r1 = $request->Item1;
        $questionario->r2 = $request->Item2;
        $questionario->r3 = $request->Item3;
        $questionario->r4 = $request->Item4;
        $questionario->r5 = $request->Item5;
        $questionario->r6 = $request->Item6;
        $questionario->r7 = $request->Item7;
        $questionario->r8 = $request->Item8;
        $questionario->r9 = $request->Item9;
        $questionario->r10 = $request->Item10;

        $studyUser = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        $questionario->studyUser()->associate($studyUser);

        $questionario->save();

        $response = array('status' => 'success', 'msg' => 'upload questionary completed: '.$questionario);
        return response()->json($response);
    }
}

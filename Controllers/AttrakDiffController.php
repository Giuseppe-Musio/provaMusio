<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AttrakdiffQuestionary;
use App\Models\StudyUser;

class AttrakDiffController extends Controller
{
    public function index()
    {
        return view('front.partecipante.studio.questionari.aa');
    }

    public function store(Request $request, $idstudio)
    {
        $questionario = new AttrakdiffQuestionary();

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
        $questionario->r11 = $request->Item11;
        $questionario->r12 = $request->Item12;
        $questionario->r13 = $request->Item13;
        $questionario->r14 = $request->Item14;
        $questionario->r15 = $request->Item15;
        $questionario->r16 = $request->Item16;
        $questionario->r17 = $request->Item17;
        $questionario->r18 = $request->Item18;
        $questionario->r19 = $request->Item19;
        $questionario->r20 = $request->Item20;
        $questionario->r21 = $request->Item21;
        $questionario->r22 = $request->Item22;
        $questionario->r23 = $request->Item23;
        $questionario->r24 = $request->Item24;
        $questionario->r25 = $request->Item25;
        $questionario->r26 = $request->Item26;
        $questionario->r27 = $request->Item27;
        $questionario->r28 = $request->Item28;

        $studyUser = StudyUser::where('study_id', $idstudio)->where('user_id', Auth::id())->first();
        $questionario->studyUser()->associate($studyUser);

        $questionario->save();

        $response = array('status' => 'success', 'msg' => 'upload questionary completed: '.$questionario);
        return response()->json($response);
    }
}

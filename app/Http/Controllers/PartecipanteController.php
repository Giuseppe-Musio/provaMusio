<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\StudyUser;

class PartecipanteController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget('queue_job');
        session()->forget('id_studio_execute');

        $studi = StudyUser::where('user_id', Auth::id())->orderBy('flag_complete','asc')->with('study')->get();
        return view('front.partecipante.home')->with('lista',$studi);
    }

    public function checkUser()
    {
        if(Auth::user()->role() == 'expert')
            return redirect()->route('esperto.home');

        if(Auth::user()->role() == 'tester')
            return redirect()->route('partecipante.home');
    }
}

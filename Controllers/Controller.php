<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function goToHome()
    {
        if(Auth::user()->role() == 'expert'){
           return redirect()->route('esperto.home');
        }

        if(Auth::user()->role() == 'tester')
            return redirect()->route('partecipante.home');
    }
}

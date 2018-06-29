<?php
/**
 * Created by PhpStorm.
 * User: andreese
 * Date: 05/01/2018
 * Time: 18:14
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
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

    public function indexUser()
    {
        return $this->goToHome();
    }




 
    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }


     public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // corrispondenza delle password
            return redirect()->back()->with("error","La tua password attuale non corrisponde alla password che hai fornito. Per favore riprova.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //password corrente e nuova password sono uguali
            return redirect()->back()->with("error","La nuova password non può essere uguale alla tua password corrente. Si prega di scegliere una password diversa.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Cambia Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password cambiata con successo !");
 
    }
 





}
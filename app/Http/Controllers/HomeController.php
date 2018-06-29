<?php
/**
 * Created by PhpStorm.
 * User: andreese
 * Date: 05/01/2018
 * Time: 18:14
 */

namespace App\Http\Controllers;

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
}
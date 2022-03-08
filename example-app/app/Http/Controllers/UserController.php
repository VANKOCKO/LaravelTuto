<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use \Request;


class UserController extends Controller
{
    public function __construct()
    {
       // $this->middleware('ip');
    }
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {

       $nom = "kocko";

        return view('user',
                       [
                        'nom' => $nom
                       ]);
    }


    public function formBuilderShow(){
        echo Form::label('email', 'E-Mail Address');
    }


}

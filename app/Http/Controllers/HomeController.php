<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {

        $matricula  =   getenv('USERNAME');

        return view('welcome', ['matricula' => $matricula]);
    }
}
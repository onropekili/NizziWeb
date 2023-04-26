<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menuController extends Controller
{
    //
    public function Menu(Request $request){
        return view('user.menu');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request){
        $message = $request->input('message');
        $mobile = $request->input('mobile');
    }
}

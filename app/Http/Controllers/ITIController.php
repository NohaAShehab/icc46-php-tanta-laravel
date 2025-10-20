<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ITIController extends Controller
{
    // --> contains controller functions ?? 

    function printVariable ($var){

        return "<h1 style='color: red; text-align: center;'> You entered {$var} </h1>";
    }

    function getTest(){
        return "<h1> Hello Test from controller </h1>";
    }
}
